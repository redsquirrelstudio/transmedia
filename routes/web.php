<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;

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

if(env('SHOW_LANDING')){
    Route::get('/', function () {
       return view('landing');
    });
}
else{
    Route::get('/', [PageController::class, 'index'])->name('page.index');
    Route::get('/exhibition', [PageController::class, 'exhibition'])->name('page.exhibition');
    Route::get('/my-page', [PageController::class, 'my_page'])->name('page.personal');
    Route::get('/students', [PageController::class, 'students'])->name('page.students');
    Route::get('/students/course/{course_slug}', [PageController::class, 'students_course'])->name('page.course');
    Route::get('/students/year/{year}', [PageController::class, 'year'])->name('page.years');
    Route::get('/students/year/{year}/course/{course_slug}', [PageController::class, 'course'])->name('page.courses');


    Route::get('/login', [PageController::class, 'login'])->name('page.login');
    Route::get('/register', [PageController::class, 'register'])->name('page.register');


    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

}



/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('users')->name('users/')->group(static function() {
            Route::get('/',                                             'UserController@index')->name('index');
            Route::get('/create',                                       'UserController@create')->name('create');
            Route::post('/',                                            'UserController@store')->name('store');
            Route::get('/{user}/edit',                                  'UserController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'UserController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{user}',                                      'UserController@update')->name('update');
            Route::delete('/{user}',                                    'UserController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('featured-projects')->name('featured-projects/')->group(static function() {
            Route::get('/',                                             'FeaturedProjectController@index')->name('index');
            Route::get('/create',                                       'FeaturedProjectController@create')->name('create');
            Route::post('/',                                            'FeaturedProjectController@store')->name('store');
            Route::get('/{featuredProject}/edit',                       'FeaturedProjectController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'FeaturedProjectController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{featuredProject}',                           'FeaturedProjectController@update')->name('update');
            Route::delete('/{featuredProject}',                         'FeaturedProjectController@destroy')->name('destroy');
        });
    });
});
