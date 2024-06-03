<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppSetting;
use App\Models\User;
use App\Models\PaymentGateway;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Models\Role;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Property;
use App\Models\Article;
use App\Models\Slider;
use App\Models\Package;
use App\Models\Tags;
use App\Models\CategoryAmenityMapping;
use App\Models\ExtraPropertyLimit;
use App\Models\LanguageDefaultList;
use App\Models\LanguageTable;
use App\Models\LanguageKeyword;
use App\Models\Screen;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    
    /*
     * Dashboard Pages Routs
     */
    public function index(Request $request)
    {
        $auth_user = auth()->user();
        
        $data['dashboard'] = [

            'total_customer' => User::where('user_type', 'user')->whereNULL('is_agent')->whereNULL('is_builder')->count(),
            'total_agent'    => User::where('user_type', 'user')->where('is_agent',1)->count(),
            'total_builder'  => User::where('user_type', 'user')->where('is_builder',1)->count(),
            'total_property' => Property::count(),
            'sell_property'  => Property::where('property_for',1)->count(),
            'rent_property'  => Property::where('property_for',0)->count(),
        ];

        $data['property'] = Property::orderBy('id', 'desc')->take(5)->get();
        $data['customer'] = User::where('user_type', 'user')->whereNULL('is_agent')->whereNULL('is_builder')->orderBy('id', 'desc')->take(5)->get();
        $data['agent'] = User::where('user_type','user')->where('is_agent',1)->orderBy('id', 'desc')->take(5)->get();
        $data['news_article'] = Article::where('status', 1)->orderBy('id', 'desc')->take(5)->get();
        
        if( $auth_user->hasRole('admin') ) {
            return view('dashboards.admin-dashboard',compact('data', 'auth_user'));
        }
        return view('dashboards.user-dashboard',compact('data', 'auth_user'));
    }

    public function changeLanguage($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

    /*
     * Auth pages Routs
     */

     function authLogin()
    {
    return view('auth.login');
    }

    function authRegister()
    {
        $assets = ['phone'];
        return view('auth.register',compact('assets'));
    }

    function authRecoverPassword()
    {
        return view('auth.forgot-password');
    }

    function authConfirmEmail()
    {
        return view('auth.verify-email');
    }

    function authLockScreen()
    {
        return view();
    }

    public function changeStatus(Request $request)
    {
        $type = $request->type;
        $message_form = "";
        $message = __('message.update_form',['form' => __('message.status')]);
        switch ($type) {
            case 'role':
                    $role = \App\Models\Role::find($request->id);
                    $role->status = $request->status;
                    $role->save();
            break;
            case 'user':
                $customer = User::find($request->id);
                $status = $request->status == 0 ? 'inactive' : 'active';
                $customer->status = $status;
                $customer->save();
        break;
            default:
                    $message = 'error';
                break;
        }

        if($message_form != null){
            $message =  __('message.added_form',['form' => $message_form ]);
            if($request->status == 0){
                $message = __('message.remove_form',['form' => $message_form ]);
            }
        }
        
        return json_custom_response(['message'=> $message , 'status' => true]);
    }

    public function getAjaxList(Request $request)
    {
        $items = array();
        $value = $request->q;
        $auth_user = authSession();
        switch ($request->type) {
            case 'permission':
                $items = \App\Models\Permission::select('id','name as text')->whereNull('parent_id');
                if($value != ''){
                    $items->where('name', 'LIKE', $value.'%');
                }
                $items = $items->get();
                break;

            case 'timezone':
                $items = timeZoneList();
                foreach ($items as $k => $v) {
                    if($value !=''){
                        if (strpos($v, $value) !== false) {

                        } else {
                            unset($items[$k]);
                        }
                    }
                }
                $data = [];
                $i = 0;
                foreach ($items as $key => $row) {
                    $data[$i] = [
                        'id'    => $key,
                        'text'  => $row,
                    ];
                    $i++;
                }
                $items = $data ;
                break;
            case 'roles':
                $items = Role::where('status',1)->whereNotIn('name', ['admin']);
                    if($value != ''){
                        $items->where('name', 'LIKE', '%'.$value.'%');
                    }

                    $items = $items;
                    break;
            case 'amenity':
                $items = Amenity::select('id','name as text')->where('status',1);
                    if($value != ''){
                        $items->where('name', 'LIKE', '%'.$value.'%');
                    }
                    $items = $items->get();
                    break;
            case 'category':
                $items = Category::select('id','name as text')->where('status',1);
                    if($value != ''){
                        $items->where('name', 'LIKE', '%'.$value.'%');
                    }
                    $items = $items->get();
                    break;
            case 'property':
                $items = Property::select('id','name as text')->where('status',1);
                    if($value != ''){
                        $items->where('name', 'LIKE', '%'.$value.'%');
                    }
                    $items = $items->get();
                    break;
            case 'property-category':
                    $category_id = $request->category_id;
                    $items = Property::select('id','name as text')->where('category_id', $category_id);
                    if($value != ''){
                        $items->where('name', 'LIKE', '%'.$value.'%');
                    }
                    $items = $items->get();
                    break;
            case 'bhk':
                $data = [];
                $data[] = [
                    'id' => 0,
                    'text' => __('message.none'),
                ];
                for ($x = 1; $x < 11; $x++) {
                    
                    $val = $x;
                    $data[] = [
                        'id' => $val,
                        'text' => $val.' '.__('message.bhk'),
                    ];
                }
               $items = $data;
                break;
            case 'property-city':
                $items = Property::select('city as text')->distinct('city')->where('status', 1);

                    if ($value != '') {
                        $items->where('city', 'LIKE', '%' . $value . '%');
                    }

                    $items = $items->get()->map(function ($city) {
                        return ['id' => $city->text, 'text' => $city->text];
                    });

                    $items = $items;
                break;
            case 'tags':
                $items = Tags::select('id','name as text');
                    if($value != ''){
                        $items->where('name', 'LIKE', '%'.$value.'%');
                    }
                    $items = $items->get();
                    break;
            case 'customer':
                $items = User::where('user_type','user')->where('status', 'active')->select('id','display_name as text');
                    if($value != ''){
                        $items->where('display_name', 'LIKE', '%'.$value.'%');
                    }
                    $items = $items->get();
                    break;
            case 'languagetable':
                $items = LanguageTable::select('id','language_name as text')->where('status', 1);
                    if($value != ''){
                        $items->where('language_name', 'LIKE', '%'.$value.'%');
                    }
                    $items = $items->get();
                    break;
            case 'languagekeyword':
                $items = LanguageKeyword::select('id','keyword_name as text');
                    if($value != ''){
                        $items->where('keyword_name', 'LIKE', '%'.$value.'%');
                    }
                    $items = $items->get();
                    break;
            case 'languagelist':
                $data = LanguageTable::pluck('language_id')->toArray();
                $items = LanguageDefaultList::whereNotIn('id',$data)->select('id','languageName as text');
                    if($value != ''){
                        $items->where('languageName', 'LIKE', '%'.$value.'%');
                    }
                    $items = $items->get();
                    break;
            case 'language-list-data':
                $languageId = $request->id;
                $items = LanguageDefaultList::where('id', $languageId);
                $items = $items->first();
                    break;
            case 'screen':
                $items = Screen::select('screenId','screenName as text');
                if($value != ''){
                    $items->where('screenName', 'LIKE', '%'.$value.'%');
                }
                $items = $items->get()->map(function ($screen_id) {
                    return ['id' => $screen_id->screenId, 'text' => $screen_id->text];
                });
                
                $items = $items;
                    break;
            default :
                break;
        }
        return response()->json(['status' => true, 'results' => $items]);
    }

    public function removeFile(Request $request)
    {
        $type = $request->type;
        $data = null;

        switch ($type) {

            case 'gateway_image':
                $data = PaymentGateway::find($request->id);
                $message = __('message.msg_removed',[ 'name' => __('message.paymentgateway')]);
                break;

            case 'amenity_image':
                $data = Amenity::find($request->id);
                $message = __('message.msg_removed',[ 'name' => __('message.amenity')]);
                break;

            case 'category_image':
                $data = Category::find($request->id);
                $message = __('message.msg_removed',[ 'name' => __('message.category')]);
                break;

            case 'property_image':
                $data = Property::find($request->id);
                $message = __('message.msg_removed',[ 'name' => __('message.property')]);
                break;

            case 'property_gallary':
                $data = Media::find($request->id);
                $data->delete();
                $data = null;
                $type = $request->id;
                $message = __('message.msg_removed',[ 'name' => __('message.property')]);
                break;

            case 'article_image':
                $data = Article::find($request->id);
                $message = __('message.msg_removed',[ 'name' => __('message.article')]);
                break;

            case 'slider_image':
                $data = Slider::find($request->id);
                $message = __('message.msg_removed',[ 'name' => __('message.slider')]);
                break;

            case 'language_image':
                $data = LanguageTable::find($request->id);
                $message = __('message.msg_removed',[ 'name' => __('message.slider')]);
                break;

            default:
                $data = AppSetting::find($request->id);
                $message = __('message.msg_removed',[ 'name' => __('message.image')]);
            break;
        }

        if($data != null){
            $data->clearMediaCollection($type);
        }
        $response = [
                'status' => true,
                'id' => $request->id,
                'image' => getSingleMedia($data,$type),
                'preview' => $type."_preview",
                'message' => $message
        ];
        return json_custom_response($response);
    }
    public function destroySelected(Request $request) {
        // dd($request->all());
            $checked_ids = $request->datatable_checked_ids;
            $types = $request->datatable_button_title;
            $data = null;
            $status = true;

            switch ($types) {
                case 'customer-checked':
                        $data = User::destroy($checked_ids);
                        $message = __('message.delete_form', ['form' => __('message.customer')]);
                    break;
                case 'agent-checked':
                        $data = User::destroy($checked_ids);
                        $message = __('message.delete_form', ['form' => __('message.agent')]);
                    break;
                case 'builder-checked':
                        $data = User::destroy($checked_ids);
                        $message = __('message.delete_form', ['form' => __('message.builder')]);
                    break;
                case 'users-checked':
                        $data = User::destroy($checked_ids);
                        $message = __('message.delete_form', ['form' => __('message.sub_admin')]);
                    break;
                case 'amenity-checked':
                    $category_amenity = CategoryAmenityMapping::whereIn('amenity_id', $checked_ids)->pluck('id');
                    if (!$category_amenity->isEmpty()) {
                        $message = __('message.cannot_delete_associated');
                        $status = false;
                    } else {
                        $data = Amenity::destroy($checked_ids);
                        $message = __('message.delete_form', ['form' => __('message.amenity')]);
                    }
                    break;
                case 'category-checked':
                    $property = Property::whereIn('category_id', $checked_ids)->pluck('id');
                    if (!$property->isEmpty()) {
                        $message = __('message.cannot_delete_associated');
                        $status = false;
                    } else {
                        $data = Category::destroy($checked_ids);
                        $message = __('message.delete_form', ['form' => __('message.category')]);
                    }
                    break;
                case 'property-checked':
                        $data = Property::destroy($checked_ids);
                        $message = __('message.delete_form', ['form' => __('message.property')]);
                    break;
                case 'article-checked':
                        $data = Article::destroy($checked_ids);
                        $message = __('message.delete_form', ['form' => __('message.news_article')]);
                    break;
                case 'slider-checked':
                        $data = Slider::destroy($checked_ids);
                        $message = __('message.delete_form', ['form' => __('message.slider')]);
                    break;
                case 'package-checked':
                        $data = Package::destroy($checked_ids);
                        $message = __('message.delete_form', ['form' => __('message.package')]);
                    break;
                case 'tags-checked':
                        $data = Tags::destroy($checked_ids);
                        $message = __('message.delete_form', ['form' => __('message.tags')]);
                    break;
                case 'extra-property-limit-checked':
                        $data = ExtraPropertyLimit::destroy($checked_ids);
                        $message = __('message.delete_form', ['form' => __('message.extrapropertylimit')]);
                    break;
                case 'language-keyword-checked':
                        $data = LanguageKeyword::destroy($checked_ids);
                        $message = __('message.delete_form', ['form' => __('message.languagekeyword')]);
                        updateLanguageVersion();
                    break;
                case 'language-table-checked':
                        $data = LanguageTable::destroy($checked_ids);
                        $message = __('message.delete_form', ['form' => __('message.language')]);
                        updateLanguageVersion();
                    break;
                default:
                    $status  =  false;
                    $message =  false;
                break;
            }

            $response = [ 'success' => $status, 'message' => $message ];
            return json_custom_response($response);
    }
}
