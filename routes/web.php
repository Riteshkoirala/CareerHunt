<?php

use App\Http\Controllers\AdditionalResourceController;
use App\Http\Controllers\Assessment\AssessmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Cv\CvController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Frontend\Comment\CommentController;
use App\Http\Controllers\Frontend\Post\PostController;
use App\Http\Controllers\CareerRecommendationController;
use App\Http\Controllers\Profile\UserProfileController;
use App\Http\Controllers\ReactionController;
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
//Route::get('/recommend',[DashboardController::class,'recommend'])->name('recommend');
Route::get('/login',[LoginController::class,'index'])->name('loign');
Route::get('/Signup',[LoginController::class,'Signup'])->name('signup');
Route::get('/google-Sign-in',[LoginController::class,'signInGoogle'])->name('googleSignIn');
Route::get('/github-sign-in',[LoginController::class,'gitRedirect'])->name('githubSignIn');
Route::get('/linkedin-sign-in',[LoginController::class,'linkRedirect'])->name('linkedinSignIn');
Route::get('google',[LoginController::class, 'getData'])->name('google');
Route::get('/github',[LoginController::class, 'getGitData'])->name('github');
Route::get('/linkedin',[LoginController::class, 'getLinkData'])->name('linkedin');

Route::get('/lock-first-code/{user}',[LoginController::class,'FirstLoginCode'])->name('logFirCode');
Route::get('/resend/{user}',[LoginController::class,'resendLink'])->name('resend');

Route::get('login-admin/',[LoginController::class, 'adminLogin']);
Route::get('login-Auth/{user}',[LoginController::class, 'loginAuthenticate'])->name('login-Auth');
Route::get('login-Auth/{user}',[LoginController::class, 'loginAuthenticate'])->name('login-Auth');

Route::resource('contact', ContactController::class);

Route::middleware(['auth'])->group( function () {

    Route::get('logout', [LoginController::class, 'destroy'])
        ->name('logout');

    Route::get('like', [ReactionController::class, 'postLikeReaction'])->name('likes');
    Route::get('Dis', [ReactionController::class, 'postDisReaction'])->name('Dis');

    Route::get('likec', [ReactionController::class, 'commentLikeReaction'])->name('likesc');
    Route::get('Disc', [ReactionController::class, 'commentDisReaction'])->name('Disc');


    Route::resource('post', PostController::class);
    Route::resource('Assessment', AssessmentController::class);
    Route::resource('profile', UserProfileController::class);
    Route::resource('cv', CvController::class);
    Route::resource('comment', CommentController::class);
    Route::get('contacts/update/{id}', [ContactController::class, 'update'])->name('contact.up');
    Route::resource('additional-resource', AdditionalResourceController::class);

    Route::post('save-and-exit', [AssessmentController::class, 'saveAndExit'])->name('save-and-exit');
    Route::post('save-and-next', [AssessmentController::class, 'saveAndNext'])->name('save-and-next');

    Route::get('cv-pdf', [CvController::class, 'getPDF'])->name('preview.pdf');
    Route::get('easy-mode/od23h2i32b53b45i3b53iu4/{tag}', [AssessmentController::class, 'easy'])->name('easy');
    Route::get('intermediate-mode/094238753837289349hyy2uguyc/{tag}', [AssessmentController::class, 'intermediate'])->name('intermediate');
    Route::get('hard-mode/cniwbncwviewbv9080w890we/{tag}', [AssessmentController::class, 'hard'])->name('hard');


    Route::get('post-attachment/{id}', [PostController::class, 'attachmentDestroy'])->name('attachment-destroy');
    Route::get('photo/update/{id}', [CvController::class, 'photoUpdate'])->name('phUp');


    Route::get('/recommend', [CareerRecommendationController::class, 'getRecommendations'])->name('recommend');
    Route::get('/chat', [\App\Http\Controllers\ChatController::class, 'chat'])->name('chat');
    Route::get('user/delete/{id}', [\App\Http\Controllers\UserController::class, 'deleteUser'])->name('deleteUser');
//Route::get('/get-recommendation-info', 'App\Http\Controllers\CareerRecommendationController@getInfo');
});
