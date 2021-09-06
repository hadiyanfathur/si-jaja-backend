<?php

namespace App\Services;

use App\Constant\ProgressionStatus;
use App\Models\Progression;
use App\Models\Road;
use App\Repositories\Contracts\RoadRepositoryInterface;
use App\Traits\HasDatatable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProgressionService
{
    use HasDatatable;

    private $roadRepository;

    public function __construct(RoadRepositoryInterface $roadRepository)
    {
        $this->roadRepository = $roadRepository;
    }

    public function store($request, $road)
    {
        DB::transaction(function () use ($request, $road) {
            $road->update($request);
            $road->progressions()->create(array_merge($request, ['status' => ProgressionStatus::ONGOING]));
            if (isset($request['images']))
            {
                $progression = Progression::findOrFail($road->latestProgression->id);
                $progression->images()->createMany(
                    collect($request['images'])->map(function($image, $key)
                    {
                        $path = $this->imageUpload($image);
                        return [
                            'path' => $path,
                        ];
                    })->toArray()
                );
            }
        });

        return ['id' => $road->ongoing->id];
    }

    public function done($road)
    {
        $progression = $road->latestProgression->replicate();
        $progression->status = ProgressionStatus::DONE;
        $progression->save();
        return true;
    }

    public function datatable()
    {
        $query = $this->roadRepository->withLatestProgression();

        $query->where('start_at', '=', null);

        $datatable = $this->generate($query->get(), 'roads', null);
        $datatable->addColumn('execution', function ($model) {
            $map['execution_url'] = route('progressions.create', $model->id);
            return view('progression.execution-button', $map);
        });

        return $datatable->make(true);
    }

    public function imageUpload($image): string
    {
        $img = explode(',', $image);
        $img = str_replace(' ', '+', $img[1]);
        $data = base64_decode($img);
        $name = 'images/image'.date("Y-m-d", strtotime(now())).'-'.Str::random(10).'.png';
        Storage::put('public/'.$name, $data, 'public');
        return $name;
    }

    public function upload($request, $road)
    {
        $progression = Progression::findOrFail($road->latestProgression->id);
        $progression->images()->createMany(
            collect($request['images'])->map(function($image, $key)
            {
                $path = $image->storeAs('images', 'image'.date("Y-m-d", strtotime(now())).'-'.Str::random(10).'.png', 'public');
                return [
                    'path' => $path,
                ];
            })->toArray()
        );

        return true;
    }
}
