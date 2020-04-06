<?php
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|---------------------------------------0-----------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'prefix' => 'auth',
],
    function () {
        Route::post('login', 'Auth\AuthController@login')->name('login');
        Route::post('register', 'Auth\AuthController@register');
        Route::group([
            'middleware' => 'auth:api',
        ], function () {
            Route::get('logout', 'Auth\AuthController@logout');
            Route::get('user', 'Auth\AuthController@user');
        });
    });
Route::resource('/ionic-serviceCatagories', 'ionicServiceCatagories');
Route::resource('/ionic-serviceProviders', 'ionicServiceProvidersController');
Route::resource('/ionic-menuItems', 'ionicMenuItems');
Route::resource('/ionic-happyHour', 'ionicHappyHourController');
Route::resource('/ionic-itemsGroup', 'ionicItemsGroupController');
Route::resource('/ionic-favoriteMenuItem', 'FavoriteMenuItemController');
Route::resource('/ionic-favorite', 'favController');
Route::resource('/ionic-tables', 'TablesController');
Route::resource('/ionic-customerOrders', 'CustomerOrdersController');
Route::resource('/ionic-spRating', 'IonicSPRatingController');
Route::resource('/ionic-miRating', 'ionicMIRatingController');
Route::resource('/ionic-officialAds', 'ionicOfficialAdsController');
// Route::get('serviceProviderLogo/{filename}', 'CHRLServiceProvidersController@getLogo');
// Route::get('menuItem/picture/{filename}', 'MenuItemsController@getPicture');
Route::get('/time', function (Request $request) {
    return "yes";
});
