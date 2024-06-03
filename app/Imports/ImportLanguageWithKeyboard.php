<?php

namespace App\Imports;

use App\Models\LanguageContent;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;


class ImportLanguageWithKeyboard implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
       
        $id = $row['id'];

        $languageContent = LanguageContent::find($id);

        $languageContent->update([
            'keyword_value' => $row['keyword_value'],
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}
