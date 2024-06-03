<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Tags;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $tags = null;
        if(isset($this->tags_id)) {
            $tags = Tags::whereIn('id', $this->tags_id)->get()->map(function ($item) {
                return [
                    'id'   => $item->id,
                    'name' => $item->name,
                ];
            });
        }
        
        return [
            'id'                   => $this->id,
            'name'                 => $this->name,
            'tags'                 => $tags,
            'description'          => $this->description,
            'status'               => $this->status,
            'article_image'        => getSingleMedia($this, 'article_image',null),
            'created_at'           => $this->created_at,
            'updated_at'           => $this->updated_at,
        ];
    }
}