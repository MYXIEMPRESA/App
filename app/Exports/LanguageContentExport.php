<?php

namespace App\Exports;

use App\Models\LanguageContent;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class LanguageContentExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $language_content = LanguageContent::orderBy('id','asc')->get();

        $language = isset($_GET['language']) ? $_GET['language'] : null;
        if( $language != null ) {
            $language_content = $language_content->where('language_id',$language);
        }
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;
        if( $keyword != null ) {
            $language_content = $language_content->where('keyword_id',$keyword);
        }
        $screen = isset($_GET['screen']) ? $_GET['screen'] : null;
        if( $screen != null ) {
            $language_content = $language_content->where('screen_id',$screen);
        }   

        return $language_content;
        
    }
    
    public function map($language_content): array
    {
        return [
            $language_content->id,
            optional($language_content->languageTable)->language_name,
            optional($language_content->screen)->screenName,
            optional($language_content->languageKeyword)->keyword_name,
            $language_content->keyword_value, 

        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            __('message.language_name'),
            __('message.screen_name'),
            __('message.keyword_name'),
            __('message.keyword_value'),
        ];
    }
  
}