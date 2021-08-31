<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoadDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->village->name.", ".$this->district->name.", ".$this->city->name.", ".$this->province->name,
            'status' => $this->latestProgression->status,
            'length' => $this->planning->length,
            'width' => $this->planning->width,
            'budget' => $this->planning->budget,
            'execution' => $this->when($this->start_at != null, function () {
                return [
                    'width' => $this->ongoing->width,
                    'length' => $this->ongoing->length,
                    'cost' => $this->cost,
                    'executor' => $this->executor,
                    'executor_contact' => $this->executor_contact,
                    'supervisor' => $this->supervisor,
                    'start_at' => $this->start_at,
                    'end_at' => $this->end_at,
                    'images' => ImagePathResource::collection($this->ongoing->images),
                ];
            }),
        ];
    }
}
