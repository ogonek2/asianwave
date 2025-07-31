<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Navigator;
use App\Http\Controllers\Admin;
use App\Http\Controllers\NewsAdmin;
use App\Http\Controllers\ScheduleAdmin;
use App\Http\Controllers\LectureScheduleAdmin;
use App\Http\Controllers\ShopsAdmin;
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

Route::prefix('/')->group(function () {
    Route::get('/', [Navigator::class, 'index']);
    Route::get('about', [Navigator::class, 'index']);
    Route::get('schedule', [Navigator::class, 'index']);
    Route::get('contacts', [Navigator::class, 'index']);
    Route::get('news', [Navigator::class, 'index']);
    Route::get('questionnaire', [Navigator::class, 'index']);
    Route::get('lecture-schedule', [Navigator::class, 'index']);
});

// Route::prefix('admin')->group(function () {
//     Route::get('/', [Admin::class, 'index']);
//     Route::resource('news', NewsAdmin::class);
//     Route::resource('schedule', ScheduleAdmin::class);
//     Route::resource('LectureSchedule', LectureScheduleAdmin::class);
//     Route::resource('Shops', ShopsAdmin::class);
// });

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
