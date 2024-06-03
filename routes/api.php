<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\API;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[API\UserController::class, 'register']);
Route::post('social-otp-login',[ API\UserController::class, 'socialOTPLogin' ]);
Route::get('appsetting', [ API\DashboardController::class, 'appsetting'] );
Route::get('language-table-list',[API\LanguageTableController::class, 'getList']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('user-detail',[API\UserController::class, 'userDetail']);
    Route::get('customer-detail',[API\UserController::class, 'customerDetail']);

    Route::post('notification-list', [ API\NotificationController::class, 'getList'] );
    Route::get('notification-detail', [ API\NotificationController::class, 'getNotificationDetail'] );

    Route::get('payment-gateway-list', [ API\PaymentGatewayController::class, 'getList'] );
    
    Route::post('update-profile', [ API\UserController::class, 'updateProfile']);
    Route::post('change-password',[ API\UserController::class, 'changePassword']);
    Route::post('update-user-status', [ API\UserController::class, 'updateUserStatus']);
    Route::post('delete-user-account', [ API\UserController::class, 'deleteUserAccount']);
    Route::get('logout',[ API\UserController::class, 'logout']);


    Route::get('amenity-list', [ API\AmenityController::class, 'getList' ]);
    Route::get('category-list', [ API\CategoryController::class, 'getList' ]);

    Route::post('nearby-property-list', [ API\PropertyController::class, 'getNearByPropertyList' ]);
    Route::get('property-list', [ API\PropertyController::class, 'getList' ]);
    Route::post('property-detail', [ API\PropertyController::class, 'getDetail' ]);
    Route::post('property-view', [ API\PropertyController::class, 'getView' ]);
    Route::get('my-property', [ API\PropertyController::class, 'getMyPropertyList' ]);
    Route::post('search-location', [ API\PropertyController::class, 'searchLoction' ]);
    Route::post('property-delete/{id}', [ API\PropertyController::class, 'delete' ] );
    Route::post('property-save', [ App\Http\Controllers\PropertyController::class, 'store' ] );
    Route::post('property-update/{id}', [ App\Http\Controllers\PropertyController::class, 'update' ] );

    Route::get('get-favourite-property', [ API\PropertyController::class, 'getUserFavouriteProperty' ]);
    Route::post('set-favourite-property', [ API\PropertyController::class, 'userFavouriteProperty' ]);

    Route::get('article-list',[API\ArticleController::class, 'getList']);
    Route::post('article-detail',[API\ArticleController::class, 'getDetail']);


    Route::get('package-list', [ API\PackageController::class, 'getList' ]);
    Route::get('slider-list', [ API\SliderController::class, 'getList' ]);
    Route::get('tags-list',[API\TagsController::class, 'getList']);
    Route::post('dashboard-list', [ API\DashboardController::class, 'dashboard' ]);
    Route::post('filter-property-list',[ API\FilterListPropertyController::class, 'filterPropertyList']);

    Route::get('subscriptionplan-list',[ API\SubscriptionController::class, 'getList']);
    Route::post('subscribe-package',[ API\SubscriptionController::class, 'subscriptionSave']);
    Route::post('cancel-subscription',[ API\SubscriptionController::class, 'cancelSubscription']);

    Route::post('inquiry-for-property', [ API\PropertyViewHistoryController::class, 'inqueryForProperty' ]);


    Route::get('get-setting',[ API\DashboardController::class, 'getSetting']);

    Route::get('extra-property-limit-list', [ API\ExtraPropertyLimitController::class, 'getList' ]);
    Route::post('purchase-extra-property-limit', [ API\ExtraPropertyLimitController::class, 'purchaseExtraLimit' ]);

    Route::post('set-property-advertisement', [ API\PropertyController::class, 'setPropertyAsAdvertisement' ] );
    Route::get('get-my-advertisement-property', [ API\PropertyController::class, 'getMyAdvertisementProperty' ] );

    // Who visit my property for inquiry 
    Route::get('who-inquired-my-property', [ API\PropertyController::class, 'whoInquiredMyProperty' ] );

    // Who visit my property for inquiry distinct by user
    Route::get('who-inquired-my-property-user-list', [ API\PropertyController::class, 'whoInquiredMyPropertyUserList' ] );

    // i am visited property for inquiry 
    Route::get('user-inquiry-property', [ API\PropertyController::class, 'viewInquiryForProperty' ] );


    Route::get('get-others-advertisement-property', [ API\PropertyController::class, 'getOthersAdvertisementProperty' ] );
});
