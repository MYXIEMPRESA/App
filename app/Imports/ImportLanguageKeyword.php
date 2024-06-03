<?php

namespace App\Imports;

use App\Models\PropertyRequest;
use App\Models\LanguageKeyword;
use App\Models\LanguageTable;
use App\Models\LanguageContent;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;


class ImportLanguageKeyword implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // \Log::info($row);    
        $keyword = new LanguageKeyword([
            'keyword_name' => $row['keyword_name'],
            'default_value' => $row['default_value'],
        ]);
        $keyword->save();
        $languages = LanguageTable::all();
        $languageContents = [];
        if (count($languages) > 0 ) {
            foreach ($languages as $language) {
                $languageContent = new LanguageContent([
                    'keyword_id' => $keyword->id ?? null,
                    'language_id' => $language->id ?? null,
                    'keyword_value' => $keyword->default_value ?? null,
                ]);
                $languageContents[] = $languageContent;
            }
        }
        return $languageContents;
    }

    public function headingRow(): int
    {
        return 1;
    }
}
