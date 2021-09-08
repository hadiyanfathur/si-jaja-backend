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
            'length' => (double) $this->planning->length,
            'width' => (double) $this->planning->width,
            'budget' => (double) $this->budget,
            'execution' => $this->when($this->start_at != null, function () {
                return [
                    'width' => (double) $this->ongoing->width,
                    'length' => (double) $this->ongoing->length,
                    'cost' => (double) $this->cost,
                    'executor' => $this->executor,
                    'executor_contact' => $this->executor_contact,
                    'supervisor' => $this->supervisor,
                    'start_at' => $this->start_at,
                    'end_at' => $this->end_at,
                    'problem' => $this->ongoing->problem,
                    'images' => ImagePathResource::collection($this->ongoing->images),
                ];
            }),
        ];
    }
}
