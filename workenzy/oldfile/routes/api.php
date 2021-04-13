<?php
/*
 * File name: api.php
 * Last modified: 2021.02.28 at 23:37:53
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

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


Route::prefix('provider')->group(function () {
    Route::post('login', 'API\EProvider\UserAPIController@login');
    Route::post('register', 'API\EProvider\UserAPIController@register');
    Route::post('send_reset_link_email', 'API\UserAPIController@sendResetLinkEmail');
    Route::get('user', 'API\EProvider\UserAPIController@user');
    Route::get('logout', 'API\EProvider\UserAPIController@logout');
    Route::get('settings', 'API\EProvider\UserAPIController@settings');
});


Route::post('login', 'API\UserAPIController@login');
Route::post('register', 'API\UserAPIController@register');
Route::post('send_reset_link_email', 'API\UserAPIController@sendResetLinkEmail');
Route::get('user', 'API\UserAPIController@user');
Route::get('logout', 'API\UserAPIController@logout');
Route::get('settings', 'API\UserAPIController@settings');


Route::resource('e_provider_types', 'API\EProviderTypeAPIController');
Route::resource('e_providers', 'API\EProviderAPIController');
Route::resource('availability_hours', 'API\AvailabilityHourAPIController');
Route::resource('awards', 'API\AwardAPIController');
Route::resource('experiences', 'API\ExperienceAPIController');

Route::resource('faq_categories', 'API\FaqCategoryAPIController');
Route::resource('faqs', 'API\FaqAPIController');
Route::resource('custom_pages', 'API\CustomPageAPIController');

Route::resource('categories', 'API\CategoryAPIController');

Route::resource('e_services', 'API\EServiceAPIController');
Route::resource('galleries', 'API\GalleryAPIController');
Route::get('e_service_reviews/{id}', 'API\EServiceReviewAPIController@show')->name('e_service_reviews.show');
Route::get('e_service_reviews', 'API\EServiceReviewAPIController@index')->name('e_service_reviews.index');

Route::resource('currencies', 'API\CurrencyAPIController');
Route::resource('slides', 'API\SlideAPIController')->except([
    'show'
]);
Route::resource('booking_statuses', 'API\BookingStatusAPIController')->except([
    'show'
]);
Route::resource('option_groups', 'API\OptionGroupAPIController');
Route::resource('options', 'API\OptionAPIController');

Route::middleware('auth:api')->group(function () {
    Route::group(['middleware' => ['role:provider']], function () {
        Route::prefix('provider')->group(function () {
            Route::post('users/{id}', 'API\UserAPIController@update');
            Route::get('dashboard', 'API\DashboardAPIController@provider');
            Route::resource('e_providers', 'API\EProvider\EProviderAPIController');
            Route::resource('notifications', 'API\NotificationAPIController');
            Route::get('e_service_reviews', 'API\EServiceReviewAPIController@index')->name('e_service_reviews.index');
            Route::get('e_services', 'API\EServiceAPIController@index')->name('e_services.index');
            Route::put('payments/{id}', 'API\PaymentAPIController@update')->name('payments.update');
        });
    });
    Route::post('users/{id}', 'API\UserAPIController@update');

    Route::get('payments/byMonth', 'API\PaymentAPIController@byMonth')->name('payments.byMonth');
    Route::resource('payments', 'API\PaymentAPIController')->except(['update']);
    Route::resource('payment_methods', 'API\PaymentMethodAPIController')->only([
        'index'
    ]);
    Route::post('e_service_reviews', 'API\EServiceReviewAPIController@store')->name('e_service_reviews.store');


    Route::resource('favorites', 'API\FavoriteAPIController');
    Route::resource('addresses', 'API\AddressAPIController');

    Route::get('notifications/count', 'API\NotificationAPIController@count');
    Route::resource('notifications', 'API\NotificationAPIController');
    Route::resource('bookings', 'API\BookingAPIController');

    Route::resource('earnings', 'API\EarningAPIController');

    Route::resource('e_provider_payouts', 'API\EProviderPayoutAPIController');

    Route::resource('coupons', 'API\CouponAPIController')->except([
        'show'
    ]);
});
