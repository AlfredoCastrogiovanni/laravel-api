<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
        // return [
        //     'id' => $this->id,
        //     'name' => $this->name,
        //     'description' => $this->description,
        //     'day_to_make' => $this->day_to_make,
        //     'main_languages' => $this->main_languages,
        //     'repo_url' => $this->repo_url,
        //     // 'type' => TypeResource::collection($this->type)
        // ];
    }
}
