<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;

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


if (Options::get('show-live')) {
    Route::get('/', [PageController::class, 'index'])->name('page.index');
} else {
    Route::get('/', function () {
        return view('landing');
    });
}

Route::get('/about', [PageController::class, 'about'])->name('page.about');
Route::get('/exhibition', [PageController::class, 'exhibition'])->name('page.exhibition');
Route::get('/schedule', [PageController::class, 'schedule'])->name('page.schedule');

Route::group(['middleware' => 'auth'], function () {
    if (Options::get('student-login')) {
        Route::get('/my-page', [StudentController::class, 'my_page'])->name('page.personal');
        Route::post('/my-page/save', [StudentController::class, 'store_my_page'])->name('mypage.save');
        Route::get('/student/project/create/{user_id}', [StudentController::class, 'create_project'])->name('project.create');
        Route::post('/student/project/save/{project_id}', [StudentController::class, 'save_project'])->name('project.save');
        Route::get('/student/project/delete/{project_id}', [StudentController::class, 'delete_project'])->name('project.delete');
        Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    }
});

Route::group(['prefix' => 'students'], function () {
    Route::get('/', [StudentController::class, 'index'])->name('students.index');
    Route::get('/{student_id}', [StudentController::class, 'student'])->name('students.student');
    Route::get('/portfolio/{student_id}', [StudentController::class, 'student_portfolio'])->name('students.portfolio');

    Route::get('/course/{course_slug}', [StudentController::class, 'students_course'])->name('students.course');
    Route::get('/course/{course_slug}/year/{year}', [StudentController::class, 'students_year'])->name('students.year');
});


if (Options::get('student-login')) {
    Route::get('/login', [PageController::class, 'login'])->name('page.login');
    Route::get('/login-redirect', function () {
        return redirect('/login');
    })->name('login');

    Route::get('/register', [PageController::class, 'register'])->name('page.register');
    Route::get('/forgot', [PageController::class, 'forgot'])->name('page.forgot');
    Route::get('/reset-password/{token}', [PageController::class, 'reset'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'reset'])->name('auth.reset');

    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/forgot', [AuthController::class, 'forgot'])->name('auth.forgot');
}

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('admin-users')->name('admin-users/')->group(static function () {
            Route::get('/', 'AdminUsersController@index')->name('index');
            Route::get('/create', 'AdminUsersController@create')->name('create');
            Route::post('/', 'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login', 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit', 'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}', 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}', 'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation', 'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::get('/profile', 'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile', 'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password', 'ProfileController@editPassword')->name('edit-password');
        Route::post('/password', 'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('users')->name('users/')->group(static function () {
            Route::get('/', 'UserController@index')->name('index');
            Route::get('/create', 'UserController@create')->name('create');
            Route::post('/', 'UserController@store')->name('store');
            Route::get('/{user}/edit', 'UserController@edit')->name('edit');
            Route::post('/bulk-destroy', 'UserController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{user}', 'UserController@update')->name('update');
            Route::delete('/{user}', 'UserController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('admin-users')->name('admin-users/')->group(static function () {
            Route::get('/', 'AdminUsersController@index')->name('index');
            Route::get('/create', 'AdminUsersController@create')->name('create');
            Route::post('/', 'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login', 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit', 'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}', 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}', 'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation', 'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::get('/profile', 'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile', 'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password', 'ProfileController@editPassword')->name('edit-password');
        Route::post('/password', 'ProfileController@updatePassword')->name('update-password');

        Route::get('/settings/toggle/{key}', 'SettingsController@toggle')->name('settings.toggle');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('featured-projects')->name('featured-projects/')->group(static function () {
            Route::get('/', 'FeaturedProjectController@index')->name('index');
            Route::get('/create', 'FeaturedProjectController@create')->name('create');
            Route::post('/', 'FeaturedProjectController@store')->name('store');
            Route::get('/{featuredProject}/edit', 'FeaturedProjectController@edit')->name('edit');
            Route::post('/bulk-destroy', 'FeaturedProjectController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{featuredProject}', 'FeaturedProjectController@update')->name('update');
            Route::delete('/{featuredProject}', 'FeaturedProjectController@destroy')->name('destroy');
        });
    });
});
