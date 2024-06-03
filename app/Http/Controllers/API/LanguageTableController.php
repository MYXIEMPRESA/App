<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LanguageTable;
use App\Models\LanguageVersionDetail;
use App\Http\Resources\LanguageTableResource;

class LanguageTableController extends Controller
{
    public function getList(Request $request)
    {
        $version_data = LanguageVersionDetail::where('version_no',request('version_no'))->first();

        if (isset($version_data) && !empty($version_data)) {
            return json_custom_response([ 'status' => false, 'data' => [] ]);
        }

        $language_content = LanguageTable::query()->where('status','1')->orderBy('id', 'asc')->get();
        $language_version = LanguageVersionDetail::find(1);
        $items = LanguageTableResource::collection($language_content);

        $response = [
            'status' => true,
            'version_code' => $language_version->version_no,
            'default_language_id' => $language_version->default_language_id,
            'data' => $items,
        ];
        
        return json_custom_response($response);
    }
}
