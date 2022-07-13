<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CousrseVideoController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\TrackController;
use App\http\Controllers\Admin\TrackCourseController;
use App\http\Controllers\Admin\CousrseQuizController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizQuestionController;
use App\Http\Controllers\AllcoursesController;
use App\Http\Controllers\searchController;
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
//socialite 
Route::get('login/{provider}', 'App\Http\Controllers\Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback');

// user route 
Route::get('/','App\Http\Controllers\HomeController@index')->name('home');
Route::get('/home','App\Http\Controllers\HomeController@index')->name('home');
Auth::routes();

Route::get('/courses/{slug}','App\Http\Controllers\CourseController@index');
Route::post('/courses/{slug}','App\Http\Controllers\CourseController@enroll');
Route::get('/courses/{slug}/quizzs/{name}','App\Http\Controllers\QuizController@index')->name('question');
Route::post('/courses/{slug}/quizzs/{name}','App\Http\Controllers\QuizController@submit');
Route::get('/search' , 'App\Http\controllers\SearchController@index');
Route::get('/tracks/{name}' , 'App\Http\controllers\TrackController@index');
Route::get('/mycourses' , 'App\Http\controllers\MycoursesController@index');
Route::get('/myprofile' , 'App\Http\controllers\MyprofileController@index');
Route::post('/myprofile' , 'App\Http\controllers\MyprofileController@update');
Route::get('/allcourses' ,'App\Http\Controllers\AllcoursesController@index' );
Route::get('/contact' ,'App\Http\Controllers\ContactController@index' );
Route::post('/contact' ,'App\Http\Controllers\ContactController@send' );

// admin route
Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth' , 'admin'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/','App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' =>[ 'auth' , 'admin'] ], function () {

    Route::get('admin', function() {
		return redirect('admin/dashboard');
	});

    Route::get('admin/dashboard', 'App\Http\Controllers\Admin\HomeController@index')->name('home');


    Route::resource('admin/admins', AdminController::class, ['except' => ['show']]);

	Route::resource('admin/users', UserController::class , ['except' => ['show']]);

    Route::resource('admin/tracks', TrackController::class );
    Route::resource('admin/tracks.courses', TrackCourseController::class );


    Route::resource('admin/courses', CourseController::class );
    Route::resource('admin/courses.videos', CousrseVideoController::class );
    Route::resource('admin/courses.quizzes', CousrseQuizController::class );

    Route::resource('admin/videos', VideoController::class);

    Route::resource('admin/quizzes', QuizController::class);
    Route::resource('admin/quizzes.questions', QuizQuestionController::class );


    Route::resource('admin/questions', QuestionController::class , ['except' => ['show']]);
	

    

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\Admin\ProfileController@edit']);

	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\Admin\ProfileController@update']);

	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');

    Route::get('map', function () {return view('pages.maps');})->name('map');

    Route::get('icons', function () {return view('pages.icons');})->name('icons');

    Route::get('table-list', function () {return view('pages.tables');})->name('table');

	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\Admin\ProfileController@password']);
});

