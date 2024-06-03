<?php

namespace Database\Seeders;

use App\Models\LanguageDefaultList;
use App\Models\LanguageKeyword;
use App\Models\LanguageVersionDetail;
use App\Models\Screen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;



class LanguageDefaultListSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        //languagelist
        $json = File::get(public_path('json/languagedefaultlist.json'));
        $data = json_decode($json, true);

        foreach ($data as $item) {
            LanguageDefaultList::create([
                'languageName' => $item['languageName'],
                'languageCode' => $item['languageCode'],
                'countryCode' => $item['countryCode'],
            ]);
        }
        // //screenlist
        // $screenjson = File::get(public_path('json/screenlist.json'));
        // $screen_list_data = json_decode($screenjson, true);

        // foreach ($screen_list_data as $screen_list) {
        //     Screen::create([
        //         'screenId' => $screen_list['screenID'],
        //         'screenName' => $screen_list['ScreenName'],
        //     ]);
        // }

        // //keywordlist
        // $keywordjson = File::get(public_path('json/keywordlist.json'));
        // $keyword_list_data = json_decode($keywordjson, true);

        // foreach ($keyword_list_data as $keyword_list) {
        //     LanguageKeyword::create([
        //         'screen_id' => $keyword_list['screenId'],
        //         'keyword_id' => $keyword_list['keyword_id'],
        //         'keyword_name' => $keyword_list['keyword_name'],
        //         'keyword_value' => $keyword_list['keyword_value'],
        //     ]);
        // }

        //version
        $language_version = LanguageVersionDetail::create([
            'version_no' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
       
    }
}