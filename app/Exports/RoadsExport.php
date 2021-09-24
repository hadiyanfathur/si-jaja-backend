<?php

namespace App\Exports;

use App\Models\Road;
use App\Repositories\Contracts\RoadRepositoryInterface;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Excel;

class RoadsExport implements FromCollection, Responsable, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'road_report.xlsx';

    /**
     * Optional Writer Type
     */
    private $writerType = Excel::XLSX;

    /**
     * Optional headers
     */
    private $headers = [
        'Content-Type' => 'text/csv',
    ];

    public function __construct(RoadRepositoryInterface $road)
    {
        $this->road = $road;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->road->withLatestProgression()->get();
    }

    /**
     * @var Road $invoice
     */
    public function map($road): array
    {
        return [
            $road->name,
            $road->village->name,
            $road->district->name,
            $road->city->name,
            $road->province->name,
            $road->latestProgression->status,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Jalan',
            'Kelurahan',
            'Kecamatan',
            'Kota',
            'Provinsi',
            'Status',
        ];
    }
}
