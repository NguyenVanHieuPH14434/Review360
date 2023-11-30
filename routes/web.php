<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use App\Http\Controllers\JobTitleController;
use \App\Http\Controllers\CategoryCriteriaController;
use \App\Http\Controllers\AssessmentPeriodController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EvaluationCriteriaController;
use \App\Http\Controllers\EvalFormController;
use \App\Http\Controllers\EmployeeReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('landingpage');

// In your RouteServiceProvider or any service provider
Route::macro('resourceRoutes', function ($prefix, $routeName, $controller) {
    Route::prefix("/$prefix")->controller($controller)->name("$routeName.")->group(function () {
        Route::get('/', 'index')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/edit/{id}', 'update')->name('update');
        Route::get('/detail/{id}', 'show')->name('show');
        Route::get('/search', 'search')->name('search');
        Route::get('/import', 'importView')->name('importView');
        Route::post('/import', 'import')->name('import');
    });
});

Route::middleware(['auth'])->prefix('/')->group(function () {
    //home
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    // categoryCriteria
    Route::prefix("/category-criteria")->controller(CategoryCriteriaController::class)
        ->name("categoryCriteria.")->group(function(){
        Route::get('/', 'index')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::get('/view/{id}', 'show')->name('show');
        Route::delete('/delete', 'destroy')->name('destroy');
    });


    // AssessmentPeriod
    Route::prefix("/assessment-period")->controller(AssessmentPeriodController::class)
        ->name("assessmentPeriod.")->group(function(){
            Route::get('/', 'index')->name('list');
            Route::post('/list-users', 'getListUser')->name('getListUser');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/step2/{id}', 'step2')->name('step2');
            Route::post('/updateStep2/{id}', 'updateStep2')->name('updateStep2');
            Route::get('/step3/{id}', 'step3')->name('step3');
            Route::post('/updateStep3/{id}', 'updateStep3')->name('updateStep3');
            Route::post('/list-reviewer', 'getListReviewer')->name('getListReviewer');
            Route::post('/add-reviewer', 'addReviewer')->name('addReviewer');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/updateStep01/{id}', 'updateStep01')->name('updateStep01');

            Route::get('/editStep2/{id}', 'editStep2')->name('editStep2');

            Route::get('/view/{id}', 'show')->name('show');
            Route::delete('/delete', 'destroy')->name('destroy');
        });

    Route::prefix("/employee-reviews")->controller(EmployeeReviewController::class)
        ->name("employeeReview.")->group(function(){
            Route::get('/', 'index')->name('list');
            Route::post('/listEmpReview', 'getListEmpReview')->name('getListEmpReview');
            Route::get('/review/id={id}&asId={asID}', 'empReview')->name('empReview');
            Route::post('/storeEmpReview', 'storeEmpReview')->name('storeEmpReview');
        });

    // evaluationCriteria
    Route::prefix("/evaluation-criteria")->controller(EvaluationCriteriaController::class)
        ->name("evaluationCriteria.")->group(function(){
        Route::get('/', 'index')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/edit/{id}', 'update')->name('update');
        Route::get('/view/{id}', 'show')->name('show');
        Route::get('/delete/{id}', 'destroy')->name('destroy');
    });

    // evaluationCriteria
    Route::prefix("/evaluation-form")->controller(EvalFormController::class)
        ->name("evalForm.")->group(function(){
            Route::get('/', 'index')->name('list');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/edit/{id}', 'update')->name('update');
            Route::get('/view/{id}', 'show')->name('show');
            Route::get('/delete/{id}', 'destroy')->name('destroy');
        });

    // job title
    Route::resourceRoutes('/job-title', 'jobTitle',JobTitleController::class);

    // department
    Route::resourceRoutes('/department', 'department', DepartmentController::class);

    // user
    Route::resourceRoutes('/user', 'user', UserController::class);

});

Auth::routes();

Route::any('{url}', function(){
    return abort(404);
})->where('url', '.*');


