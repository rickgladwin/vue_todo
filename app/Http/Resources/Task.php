<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Task extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        default resource format
//        return parent::toArray($request);

//        custom resource format
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'complete' => $this->complete,
            'target_completion_date' => $this->target_completion_date,
            'status_id' => $this->status_id,
            'status_name' => $this->status->name
        ];
    }
}
