<?php


use App\Http\Controllers\Dashboard\ClassroomController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\GradeController;
use App\Http\Controllers\Dashboard\SectionController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        
        require __DIR__.'/auth.php';

        //Dashboard Routes
        Route::prefix('admin')->middleware('auth')->group(function(){
            Route::resource('/',DashboardController::class)->names('mainDashboard');
            Route::resource('grades', GradeController::class)->names('grades');
            Route::resource('classrooms', ClassroomController::class)->names('classrooms');
            Route::resource('sections', SectionController::class)->names('sections');
        });


    

});
