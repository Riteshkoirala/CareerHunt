<?php

use App\Http\Controllers\Assessment\AssessmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Cv\CvController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Frontend\Comment\CommentController;
use App\Http\Controllers\Frontend\Post\PostController;
use App\Http\Controllers\Profile\UserProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[DashboardController::class,'index'])->name('Home');
Route::get('/login',[LoginController::class,'index'])->name('loign');
Route::get('/Signup',[LoginController::class,'Signup'])->name('signup');
Route::get('/google-Sign-in',[LoginController::class,'signInGoogle'])->name('googleSignin');
Route::get('google',[LoginController::class, 'getData'])->name('google');
Route::get('/lock-first-code/{user}',[LoginController::class,'FirstLoginCode'])->name('logFirCode');

Route::get('login-Auth/{user}',[LoginController::class, 'loginAuthenticate'])->name('login-Auth');


Route::get('logout', [LoginController::class, 'destroy'])
    ->name('logout');

Route::get('additional-links', function (){
   return view('additional-resourse.index') ;
})->name('resource');

Route::resource('post', PostController::class);
Route::resource('assessment', AssessmentController::class);
Route::resource('profile', UserProfileController::class);
Route::resource('cv', CvController::class);
Route::resource('comment',CommentController::class);

Route::get('cv-pdf', [CvController::class,'getPDF'])->name('preview.pdf');
Route::get('easy-mode/od23h2i32b53b45i3b53iu4', [AssessmentController::class,'easy'])->name('easy');
Route::get('intermediate-mode/094238753837289349hyy2uguyc', [AssessmentController::class,'intermediate'])->name('intermediate');
Route::get('hard-mode/cniwbncwviewbv9080w890we', [AssessmentController::class,'hard'])->name('hard');


Route::get('post-attachment/{id}', [PostController::class,'attachmentDestroy'])->name('attachment-destroy');



