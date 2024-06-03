<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use App\Models\AppSetting;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Amenity;
use App\Models\Property;
use App\Models\Article;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SliderResource;
use App\Http\Resources\AmenityResource;
use App\Http\Resources\PropertyResource;
use App\Http\Resources\ArticleResource;

class DashboardController extends Controller
{
    public function appsetting(Request $request)
    {
        $data['app_setting'] = AppSetting::first();
        
        $data['terms_condition'] = Setting::where('type','terms_condition')->where('key','terms_condition')->first();
        $data['privacy_policy'] = Setting::where('type','privacy_policy')->where('key','privacy_policy')->first();

        $currency_code = SettingData('CURRENCY', 'CURRENCY_CODE') ?? 'USD';
        $currency = currencyArray($currency_code);
        $data['subscription'] = SettingData('subscription', 'subscription_system') ?? '0';
        
        $data['currency_setting'] = [
            'name' => $currency['name'] ?? 'United States (US) dollar',
            'symbol' => $currency['symbol'] ?? '$',
            'code' => strtolower($currency['code']) ?? 'usd',
            'position' => SettingData('CURRENCY', 'CURRENCY_POSITION') ?? 'left',
        ];
        return json_custom_response($data);
    }

    
    public function commonDashboard($request)
    {
        $data = AppSetting::first();
        
        $data['terms_condition'] = Setting::where('type','terms_condition')->where('key','terms_condition')->first();
        $data['privacy_policy'] = Setting::where('type','privacy_policy')->where('key','privacy_policy')->first();
                
        $currency_code = SettingData('CURRENCY', 'CURRENCY_CODE') ?? 'USD';
        $currency = currencyArray($currency_code);
        $data['subscription'] = SettingData('subscription', 'subscription_system') ?? '0';
        $data['currency_setting'] = [
            'name' => $currency['name'] ?? 'United States (US) dollar',
            'symbol' => $currency['symbol'] ?? '$',
            'code' => strtolower($currency['code']) ?? 'usd',
            'position' => SettingData('CURRENCY', 'CURRENCY_POSITION') ?? 'left',
        ];
        return $data;
    }

    public function dashboard(Request $request)
    {
        $appSettings = $this->commonDashboard($request);
        $per_page = is_numeric(request('per_page')) ? request('per_page') : config('constant.PER_PAGE_LIMIT');
         
        $latitude = request('latitude');
        $longitude = request('longitude');

        $user = auth()->user();
        if($request->has('player_id')) {
            $user->update(['player_id' => $request->player_id]);
        }
        
        $near_properties = [] ?? null;
        if ( $latitude && $longitude ) {
            $near_properties = Property::active()->otherProperty()->nearByProperty($latitude, $longitude)->paginate($per_page);
        }

        $category        = Category::where('status',1)->orderBy('id','desc')->paginate($per_page);
        $slider          = Slider::where('status',1)->whereHas('property', function ($q) {
                                $q->active()->otherProperty()->where('city', request('city'));
                            })
                            ->orderBy('id','desc')->paginate($per_page);
        $property        = Property::active()->otherProperty()->where('city', request('city'))->orderBy('id', 'desc')->paginate($per_page);
        $owner_property  = Property::active()->otherProperty()->where('city',request('city'))->where('saller_type',0)->orderBy('id','desc')->paginate($per_page);
        $fully_furnished_property = Property::active()->otherProperty()->where('city',request('city'))->where('furnished_type',1)->orderBy('id','desc')->paginate($per_page);
        $article         = Article::where('status',1)->orderBy('id','desc')->paginate($per_page);
        $filterConfiguration = Property::active()->otherProperty()->where('city',request('city'))->selectRaw('MIN(price) as min_price, MAX(price) as max_price, MIN(brokerage) as min_brokerage, MAX(brokerage) as max_brokerage, MIN(security_deposit) as min_security_deposit, MAX(security_deposit) as max_security_deposit, MIN(age_of_property) as min_age_of_property, MAX(age_of_property) as max_age_of_property')->first();

        $property_city = Property::select('city')->active()->distinct()->pluck('city')->map(function($city) {
            return [
                'name' => $city
            ];
        });
        
        $advertisement_property = Property::otherAdvertiseProperty()->active()->where('city',request('city'))->get();
                
        $response = [
            'app_setting'      => $appSettings,
            'category'         => CategoryResource::collection($category),
            'slider'           => SliderResource::collection($slider),
            'owner_property'   => PropertyResource::collection($owner_property),
            'property'         => PropertyResource::collection($property),
            'near_by_property' => PropertyResource::collection($near_properties),
            'fully_furnished_property' => PropertyResource::collection($fully_furnished_property),
            'article' => ArticleResource::collection($article),
            'property_city' => $property_city,
            'filter_configuration' => $filterConfiguration,
            'advertisement_property' => PropertyResource::collection($advertisement_property),

        ];
        
        return json_custom_response($response);
    }
    public function getSetting()
    {
        $setting = Setting::query();
        
        $setting->when(request('type'), function ($q) {
            return $q->where('type', request('type'));
        });

        $setting = $setting->get();
        $response = [
            'data' => $setting,
        ];
        $response['subscription'] = SettingData('subscription', 'subscription_system') ?? '0';
        $currency_code = SettingData('CURRENCY', 'CURRENCY_CODE') ?? 'USD';
        $currency = currencyArray($currency_code);
        $response['currency_setting'] = [
            'name' => $currency['name'] ?? 'United States (US) dollar',
            'symbol' => $currency['symbol'] ?? '$',
            'code' => strtolower($currency['code']) ?? 'usd',
            'position' => SettingData('CURRENCY', 'CURRENCY_POSITION') ?? 'left',
        ];

        return json_custom_response($response);
    }
}
