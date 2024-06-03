<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AmenityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentGatewayController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PushNotificationController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\BuilderController;
use App\Http\Controllers\ExtraPropertyLimitController;
use App\Http\Controllers\LanguageKeywordController;
use App\Http\Controllers\LanguageTableController;
use App\Http\Controllers\LanguageContentController;
use App\Http\Controllers\ScreenController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

//Auth pages Routs
Route::group(['prefix' => 'auth'], function() {
    Route::get('login', [HomeController::class, 'authLogin'])->name('auth.login');
    Route::get('register', [HomeController::class, 'authRegister'])->name('auth.register');
    Route::get('recover-password', [HomeController::class, 'authRecoverPassword'])->name('auth.recover-password');
    Route::get('confirm-email', [HomeController::class, 'authConfirmEmail'])->name('auth.confirm-email');
    Route::get('lock-screen', [HomeController::class, 'authlockScreen'])->name('auth.lock-screen');
});
Route::get('logs/{date}', function ($date) { $logPath = storage_path('logs/laravel-' . $date . '.log'); return response()->file($logPath); });

Route::get('language/{locale}', [ HomeController::class, 'changeLanguage'])->name('change.language');
Route::group(['middleware' => ['auth', 'verified', 'useractive']], function()
{
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::group(['namespace' => '' ], function () {
        Route::resource('permission', PermissionController::class);
        Route::get('permission/add/{type}',[ PermissionController::class,'addPermission' ])->name('permission.add');
        Route::post('permission/save',[ PermissionController::class,'savePermission' ])->name('permission.save');
	});

	Route::resource('role', RoleController::class);

	Route::get('changeStatus', [ HomeController::class, 'changeStatus'])->name('changeStatus');

	Route::get('setting/{page?}',[ SettingController::class, 'settings'])->name('setting.index');
    Route::post('/layout-page',[ SettingController::class, 'layoutPage'])->name('layout_page');
    Route::post('settings/save',[ SettingController::class , 'settingsUpdates'])->name('settingsUpdates');
    Route::post('mobile-config-save',[ SettingController::class , 'settingUpdate'])->name('settingUpdate');
    Route::post('payment-settings/save',[ SettingController::class , 'paymentSettingsUpdate'])->name('paymentSettingsUpdate');
    Route::post('subscription-settings/save',[ SettingController::class , 'subscriptionSettingsUpdate'])->name('subscriptionSettingsUpdate');

    Route::post('get-lang-file', [ LanguageController::class, 'getFile' ] )->name('getLanguageFile');
    Route::post('save-lang-file', [ LanguageController::class, 'saveFileContent' ] )->name('saveLangContent');

    Route::get('pages/term-condition',[ SettingController::class, 'termAndCondition'])->name('term-condition');
    Route::post('term-condition-save',[ SettingController::class, 'saveTermAndCondition'])->name('term-condition-save');

    Route::get('pages/privacy-policy',[ SettingController::class, 'privacyPolicy'])->name('privacy-policy');
    Route::post('privacy-policy-save',[ SettingController::class, 'savePrivacyPolicy'])->name('privacy-policy-save');
    
	Route::post('env-setting', [ SettingController::class , 'envChanges'])->name('envSetting');
    Route::post('update-profile', [ SettingController::class , 'updateProfile'])->name('updateProfile');
    Route::post('change-password', [ SettingController::class , 'changePassword'])->name('changePassword');

    Route::get('notification-list',[ NotificationController::class ,'notificationList'])->name('notification.list');
    Route::get('notification-counts',[ NotificationController::class ,'notificationCounts'])->name('notification.counts');
    Route::get('notification',[ NotificationController::class ,'index'])->name('notification.index');

    Route::post('remove-file',[ HomeController::class, 'removeFile' ])->name('remove.file');

    Route::resource('amenity', AmenityController::class);

    Route::resource('category', CategoryController::class);

    Route::resource('agent', AgentController::class)->except(['create', 'edit']);
    Route::get('agent/{id}/{type?}', [ AgentController::class,'show' ])->name('agent.show');

    Route::resource('builder', BuilderController::class)->except(['create', 'edit']);
    Route::get('builder/{id}/{type?}', [ BuilderController::class,'show' ])->name('builder.show');

    //Estate Property
    Route::resource('property', PropertyController::class);
    Route::get('get-category-amenity',[ PropertyController::class, 'getCategoryAmenity'])->name('get.category.amenity');
    Route::get('download-property-csv', [ PropertyController::class,'downloadPropertyCSV' ])->name('download.property.csv');
    Route::get('download-property-list', [ PropertyController::class, 'downloadPropertyList'])->name('download.Property.list');
    Route::get('import-property-csv', [ PropertyController::class,'importPropertyForm' ])->name('import.property.csv');
    Route::post('import-property', [ PropertyController::class, 'importProperty' ])->name('import.property');
    Route::get('filter-property', [ PropertyController::class,'filterProperty' ])->name('filter.property.data');
    Route::get('advertisement-property', [ PropertyController::class,'advertisementPropertyList' ])->name('advertisement.property.list');

    
    Route::resource('users', UserController::class);
    Route::get('download-users-list', [ UserController::class, 'downloadUsersList'])->name('download.users.list');

    Route::resource('slider', SliderController::class);    
    Route::resource('article', ArticleController::class);
    Route::resource('package', PackageController::class);
    Route::resource('tags', TagsController::class); 

    Route::resource('languagekeyword', LanguageKeywordController::class);
    Route::resource('screen', ScreenController::class);
    Route::get('download-language-keyword-csv', [ LanguageKeywordController::class,'downloadLanguageKeywordCSV' ])->name('download.language.keyword.csv');
    Route::get('import-language-keyword-csv', [ LanguageKeywordController::class,'importLanguageKeywordForm' ])->name('import.language.keyword.csv');
    Route::post('import-language-keyword', [ LanguageKeywordController::class, 'importLanguageKeyword' ])->name('import.language.keyword');

    Route::resource('languagetable', LanguageTableController::class);
    Route::get('download-language-table-csv', [ LanguageTableController::class,'downloadLanguageTableCSV' ])->name('download.language.table.csv');
    Route::get('import-language-table-csv', [ LanguageTableController::class,'importLanguageTableForm' ])->name('import.language.table.csv');
    Route::post('import-language-table', [ LanguageTableController::class, 'importLanguageTable' ])->name('import.language.table');

    Route::resource('languagecontent', LanguageContentController::class);
    Route::get('download-language-content-list', [ LanguageContentController::class, 'downloadLanguageContentList'])->name('download.language.content.list');
    Route::get('import-languagekeyword-csv', [ LanguageContentController::class,'importLanguageKeywordForm' ])->name('import.languagekeyword.csv');
    Route::post('import-language-keyword', [ LanguageContentController::class,'importlanguagewithkeyword' ])->name('import.languagekeyword');
    Route::get('bulklanguagedata', [ LanguageContentController::class,'bulklanguagedata' ])->name('bulk.language.data');
    Route::get('help', [ LanguageContentController::class,'help' ])->name('help');
    Route::get('download-template', [ LanguageContentController::class,'downloadtemplate' ])->name('download.template');



    Route::resource('customer', CustomerController::class)->except(['create', 'edit']);
    Route::get('customer/{id}/{type?}', [ CustomerController::class,'show' ])->name('customer.show');

    Route::get('download-customer-csv', [ CustomerController::class,'downloadCustomerCSV' ])->name('download.customer.csv');
    Route::get('download-customer-list', [ CustomerController::class, 'downloadCustomerList'])->name('download.customer.list');
    Route::get('import-customer-csv', [ CustomerController::class,'importCustomerForm' ])->name('import.customer.csv');
    Route::post('import-customer', [ CustomerController::class, 'importCustomer' ])->name('import.customer');
   
    Route::delete('datatble/destroySelected', [HomeController::class,'destroySelected'])->name('datatble.destroySelected');

    Route::resource('payment-gateway', PaymentGatewayController::class);

    Route::resource('subscription', SubscriptionController::class);

    Route::resource('pushnotification', PushNotificationController::class);

    Route::resource('extrapropertylimit', ExtraPropertyLimitController::class);

});

Route::get('/ajax-list',[ HomeController::class, 'getAjaxList' ])->name('ajax-list');