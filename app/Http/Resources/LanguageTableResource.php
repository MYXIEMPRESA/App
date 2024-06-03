<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LanguageTableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $get_content_data = $this->languageContent->map(function($item){
            return [
                'keyword_id'    => $item->keyword_id,
                'keyword_name'  => optional($item->languageKeyword)->keyword_name,
                'keyword_value' => $item->keyword_value,
            ];
        });
        return [
            'id'                    => $this->id,
            'default_language_name' => optional($this->LanguageDefaultList)->languageName,
            'language_image'         => getSingleMedia($this, 'language_image',null),
            'language_name'         => $this->language_name,
            'language_code'         => $this->language_code,
            'is_rtl'                => $this->is_rtl,
            'id_default_language'   => $this->is_default,
            'country_code'          => $this->country_code,
            'contentdata'           => $get_content_data,
            'created_at'            => $this->created_at,
            'updated_at'            => $this->updated_at,
        ];
    }
}
