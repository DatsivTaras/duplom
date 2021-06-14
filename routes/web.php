<?php

use App\Enums\RoleEnum;
use App\Http\Controllers\Admin\ClassesController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/not-approved', [App\Http\Controllers\HomeController::class, 'notApproved'])->name('not-approved');

Route::middleware(['auth', 'approved'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/product/index', [App\Http\Controllers\ProductsController::class,'index'])->name('product/index');
    Route::get('/products/create', [App\Http\Controllers\ProductsController::class,'create'])->name('product/create');
    Route::get('/product/store', [App\Http\Controllers\ProductsController::class,'store'])->name('product/store');
    Route::get('/product/edit/{id}', [App\Http\Controllers\ProductsController::class,'edit'])->name('product/edit');
    Route::get('/product/update', [App\Http\Controllers\ProductsController::class,'update'])->name('product/update');
    Route::get('/product/delete/{id}', [App\Http\Controllers\ProductsController::class,'delete'])->name('product/delete');

    Route::get('/test', [App\Http\Controllers\TestController::class,'index'])->name('/test');
    Route::get('/test/create', [App\Http\Controllers\TestController::class,'create'])->name('/test/create');
    Route::get('/test/createadd', [App\Http\Controllers\TestController::class,'createadd'])->name('/test/createadd');
    Route::get('/test/delete/{id}', [App\Http\Controllers\TestController::class,'delete'])->name('/test/delete');
    Route::get('/test/edit/{id}', [App\Http\Controllers\TestController::class,'edit'])->name('/test/edit');
    Route::get('/test/update', [App\Http\Controllers\TestController::class,'update'])->name('/test/update');
    Route::get('/test/question/{id}', [App\Http\Controllers\QuestionsController::class,'question'])->name('test/question');
    Route::get('/test/createquestion/{id}', [App\Http\Controllers\QuestionsController::class,'createquestion'])->name('/test/createquestion');
    Route::get('/test/addquestion', [App\Http\Controllers\QuestionsController::class,'addquestion'])->name('/test/addquestion');
    Route::get('/test/questiondelete/{id}/{id_test}', [App\Http\Controllers\QuestionsController::class,'questiondelete'])->name('/test/questiondelete');
    Route::get('/test/editquestion/{id}', [App\Http\Controllers\QuestionsController::class,'editquestion'])->name('/test/editquestion');
    Route::get('/test/updatequestion', [App\Http\Controllers\QuestionsController::class,'updatequestion'])->name('/test/updatequestion');
    Route::get('/test/passtest/{id}', [App\Http\Controllers\TestController::class,'passtest'])->name('/test/passtest');
    Route::get('/test/testresult/{id}', [App\Http\Controllers\TestController::class,'testresult'])->name('/test/testresult');

    Route::get('/test/subjects', [App\Http\Controllers\SubjectController::class,'subjects'])->name('/test/subjects');
    Route::get('/test/createsubject', [App\Http\Controllers\SubjectController::class,'createsubject'])->name('/test/createsubject');
    Route::get('/test/addsubject', [App\Http\Controllers\SubjectController::class,'addsubject'])->name('/test/addsubject');
    Route::get('/test/deletesubjects/{id}', [App\Http\Controllers\SubjectController::class,'delete'])->name('/test/deletesubjects');
    Route::get('/test/editsubject/{id}', [App\Http\Controllers\SubjectController::class,'editsubject'])->name('/test/editsubject');
    Route::get('/test/updatesubject/{id}', [App\Http\Controllers\SubjectController::class,'updatesubject'])->name('/test/updatesubject');

    Route::get('/profile', [App\Http\Controllers\ProfileController::class,'profile'])->name('/profile');
    Route::get('/profile/edit/{id}', [App\Http\Controllers\ProfileController::class,'edit'])->name('/profile/edit');
    Route::get('/profile/update/{id}', [App\Http\Controllers\ProfileController::class,'update'])->name('/profile/update');

    // 'middleware' => ['role:' . RoleEnum::ADMIN],
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', function () {
            return redirect('/admin/classes');
        });

        Route::resource('/classes', ClassesController::class)->names('admin.classes');

        Route::get('/users/approve/{id}', [UsersController::class, 'approve'])->name('admin.approve');
        Route::resource('/users', UsersController::class)->names('admin.users');
    });
});

