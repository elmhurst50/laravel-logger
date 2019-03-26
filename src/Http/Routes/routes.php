<?php
Route::group(['middleware' => ['audit', 'web', 'auth', 'security']], function () {
    Route::get('admin/laravel-logger/statistics', ['as' => 'laravel-logger.statistics.index', 'uses' => '\SamJoyce777\LaravelLogger\Http\Controllers\StatisticsController@index']);
    Route::post('admin/laravel-logger/statistics', ['as' => 'laravel-logger.statistics.index.post', 'uses' => '\SamJoyce777\LaravelLogger\Http\Controllers\StatisticsController@indexPost']);

    Route::post('admin/laravel-logger/statistics/drilldown', ['as' => 'laravel-logger.statistics.drilldown', 'uses' => '\SamJoyce777\LaravelLogger\Http\Controllers\StatisticsController@drilldown']);
    Route::post('admin/laravel-logger/statistics/drilldown-detail', ['as' => 'laravel-logger.statistics.drilldown', 'uses' => '\SamJoyce777\LaravelLogger\Http\Controllers\StatisticsController@drilldownDetail']);
});