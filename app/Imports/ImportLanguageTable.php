<?php

namespace App\Imports;

use App\Models\PropertyRequest;
use App\Models\LanguageKeyword;
use App\Models\LanguageTable;
use App\Models\LanguageContent;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;


class ImportLanguageTable implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // \Log::info($row);    
        $language = new LanguageTable([
            'language_name' => $row['language_name'],
            'language_code' => $row['language_code'],
            'language_flag' => $row['language_flag'],
            'is_rtl'        => $row['is_rtl'],
            'status'        => $row['status'],
        ]);
        $language->save();
        $language_keyword = LanguageKeyword::all();
        $languageContents = [];
        if (count($language_keyword) > 0 ) {
            foreach ($language_keyword as $value) {
                $languageContent = new LanguageContent([
                    'id' => null,
                    'keyword_id' => $value->id,
                    'language_id' => $language->id,
                    'keyword_value' => $value->default_value,
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
