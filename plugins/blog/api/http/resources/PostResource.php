<?php namespace Blog\Api\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'published_at' => $this->published_at,
            'published'    => $this->published,
            'title'        => $this->title,
            'slug'         => $this->slug,
            'excerpt'      => $this->excerpt,
            'content'      => $this->content,
            'content_html' => $this->content_html,
            'image_path'   => $this->featured_images()?->first()->getPath()
        ];
    }
}
