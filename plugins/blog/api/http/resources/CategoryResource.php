<?php namespace Blog\Api\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'           => $this->id,
            'created_at'   => $this->created_at,
            'name'         => $this->name,
            'slug'         => $this->slug,
            'description'  => $this->description
        ];
    }
}
