<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\PDFController;


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

Route::GET('/', 'App\Http\Controllers\HomeController@homePage');
Route::post('/send-contact-form', 'App\Http\Controllers\ContactController@send')->name('contact.send');

/** dashboard routes */
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', function () {
        return view('auth.admin-login');
    })->name('login');
    Route::post('/login', 'App\Http\Controllers\AdminAuthController@login')->name('login.submit');
    Route::post('/logout', 'App\Http\Controllers\AdminAuthController@logout')->name('logout');
    Route::middleware(['auth:admin'])->group(function () {
        Route::GET('/','App\Http\Controllers\AdminController@index')->name('home');
        /** Settings routes */
        Route::prefix('/setting')->group(function () {
            Route::GET('/', 'App\Http\Controllers\SettingsController@index')->name('settings.index');
            Route::GET('/create', 'App\Http\Controllers\SettingsController@create')->name('settings.create');
            Route::POST('/store', 'App\Http\Controllers\SettingsController@store')->name('settings.store');
            Route::GET('/edit/{id}', 'App\Http\Controllers\SettingsController@edit')->name('settings.edit');
            Route::PUT('/update/{id}', 'App\Http\Controllers\SettingsController@update')->name('settings.update');
            Route::DELETE('/delete/{id}', 'App\Http\Controllers\SettingsController@delete')->name('settings.delete');
        });
        /** Links routes */
        Route::prefix('/links')->group(function () {
            Route::GET('/{id}', 'App\Http\Controllers\LinksController@index')->name('links.index');
            Route::GET('/create/{id}', 'App\Http\Controllers\LinksController@create')->name('links.create');
            Route::POST('/store/{id}', 'App\Http\Controllers\LinksController@store')->name('links.store');
            Route::GET('/edit/{id}', 'App\Http\Controllers\LinksController@edit')->name('links.edit');
            Route::PUT('/update/{id}', 'App\Http\Controllers\LinksController@update')->name('links.update');
            Route::DELETE('/delete/{id}', 'App\Http\Controllers\LinksController@delete')->name('links.delete');
        });
        /** Positions routes */
        Route::prefix('/positions')->group(function () {
            Route::GET('/{id}', 'App\Http\Controllers\PositionsController@index')->name('positions.index');
            Route::GET('/create/{id}', 'App\Http\Controllers\PositionsController@create')->name('positions.create');
            Route::POST('/store/{id}', 'App\Http\Controllers\PositionsController@store')->name('positions.store');
            Route::GET('/edit/{id}', 'App\Http\Controllers\PositionsController@edit')->name('positions.edit');
            Route::PUT('/update/{position_id}', 'App\Http\Controllers\PositionsController@update')->name('positions.update');
            Route::DELETE('/delete/{id}', 'App\Http\Controllers\PositionsController@delete')->name('positions.delete');
        });
        /** About routes */
        Route::prefix('/about')->group(function () {
            Route::GET('/', 'App\Http\Controllers\AboutController@index')->name('about.index');
            Route::GET('/{id}', 'App\Http\Controllers\AboutController@show')->name('about.show');
            Route::GET('/create', 'App\Http\Controllers\AboutController@create')->name('about.create');
            Route::POST('/store', 'App\Http\Controllers\AboutController@store')->name('about.store');
            Route::GET('/edit/{id}', 'App\Http\Controllers\AboutController@edit')->name('about.edit');
            Route::PUT('/update/{id}', 'App\Http\Controllers\AboutController@update')->name('about.update');
            Route::DELETE('/delete/{id}', 'App\Http\Controllers\AboutController@delete')->name('about.delete');
        });
        /** Education routes */
        Route::prefix('/education')->group(function () {
            Route::GET('/', 'App\Http\Controllers\EducationController@index')->name('education.index');
            Route::GET('/{id}', 'App\Http\Controllers\EducationController@show')->name('education.show');
            Route::GET('/create', 'App\Http\Controllers\EducationController@create')->name('education.create');
            Route::POST('/store', 'App\Http\Controllers\EducationController@store')->name('education.store');
            Route::GET('/edit/{id}', 'App\Http\Controllers\EducationController@edit')->name('education.edit');
            Route::PUT('/update/{id}', 'App\Http\Controllers\EducationController@update')->name('education.update');
            Route::DELETE('/delete/{id}', 'App\Http\Controllers\EducationController@delete')->name('education.delete');
        });
        /** Experience */
        Route::prefix('/experience')->group(function () {
            Route::GET('/', 'App\Http\Controllers\ExperienceController@index')->name('experience.index');
            Route::GET('/create', 'App\Http\Controllers\ExperienceController@create')->name('experience.create');
            Route::POST('/store', 'App\Http\Controllers\ExperienceController@store')->name('experience.store');
            Route::GET('/edit/{id}', 'App\Http\Controllers\ExperienceController@edit')->name('experience.edit');
            Route::PUT('/update/{id}', 'App\Http\Controllers\ExperienceController@update')->name('experience.update');
            Route::DELETE('/delete/{id}', 'App\Http\Controllers\ExperienceController@delete')->name('experience.delete');
        });
        /** Projects routes */
        Route::prefix('/project')->group(function () {
            Route::GET('/', 'App\Http\Controllers\ProjectController@index')->name('project.index');
            Route::GET('/create', 'App\Http\Controllers\ProjectController@create')->name('project.create');
            Route::POST('/store', 'App\Http\Controllers\ProjectController@store')->name('project.store');
            Route::get('/edit/{id}', 'App\Http\Controllers\ProjectController@edit')->name('project.edit');
            Route::PUT('/update/{id}', 'App\Http\Controllers\ProjectController@update')->name('project.update');
            Route::DELETE('/delete/{id}', 'App\Http\Controllers\ProjectController@delete')->name('project.delete');
        });
        /** Services routes */
        Route::prefix('/service')->group(function () {
            Route::GET('/', 'App\Http\Controllers\ServiceController@index')->name('service.index');
            Route::GET('/create', 'App\Http\Controllers\ServiceController@create')->name('service.create');
            Route::POST('/store', 'App\Http\Controllers\ServiceController@store')->name('service.store');
            Route::GET('/edit/{id}', 'App\Http\Controllers\ServiceController@edit')->name('service.edit');
            Route::PUT('/update/{id}', 'App\Http\Controllers\ServiceController@update')->name('service.update');
            Route::DELETE('/delete/{id}', 'App\Http\Controllers\ServiceController@delete')->name('service.delete');
        });
        /** Skill's Category routes */
        Route::prefix('/category')->group(function () {
            Route::GET('/', 'App\Http\Controllers\SkillsCategoryController@index')->name('category.index');
            Route::GET('/create', 'App\Http\Controllers\SkillsCategoryController@create')->name('category.create');
            Route::POST('/store', 'App\Http\Controllers\SkillsCategoryController@store')->name('category.store');
            Route::GET('/edit/{id}', 'App\Http\Controllers\SkillsCategoryController@edit')->name('category.edit');
            Route::PUT('/update/{id}', 'App\Http\Controllers\SkillsCategoryController@update')->name('category.update');
            Route::DELETE('/delete/{id}', 'App\Http\Controllers\SkillsCategoryController@delete')->name('category.delete');
        });
        /** Skills routes */
        Route::prefix('/skill')->group(function () {
            Route::GET('/{id}', 'App\Http\Controllers\SkillController@index')->name('skill.index');
            Route::GET('/create', 'App\Http\Controllers\SkillController@create')->name('skill.create');
            Route::POST('/store/{id}', 'App\Http\Controllers\SkillController@store')->name('skill.store');
            Route::GET('/edit/{id}', 'App\Http\Controllers\SkillController@edit')->name('skill.edit');
            Route::PUT('/update/{id}', 'App\Http\Controllers\SkillController@update')->name('skill.update');
            Route::DELETE('/delete/{id}', 'App\Http\Controllers\SkillController@delete')->name('skill.delete');
        });
        /** Resume */
        Route::prefix('/resume')->group(function () {
            Route::GET('/', 'App\Http\Controllers\ResumeController@index')->name('resume.index');
            Route::GET('/create', 'App\Http\Controllers\ResumeController@create')->name('resume.create');
            Route::POST('/store', 'App\Http\Controllers\ResumeController@store')->name('resume.store');
            Route::GET('/edit/{id}', 'App\Http\Controllers\ResumeController@edit')->name('resume.edit');
            Route::PUT('/update/{id}', 'App\Http\Controllers\ResumeController@update')->name('resume.update');
            Route::DELETE('/delete/{id}', 'App\Http\Controllers\ResumeController@delete')->name('resume.delete');
        });
        Route::get('/visitors', [VisitorController::class, 'index'])->name('visitors.index');
        Route::post('/visitors', [VisitorController::class, 'store'])->name('visitors.store');

        // Email routes
        Route::get('/emails', [EmailController::class, 'index'])->name('emails.index');
        Route::get('/emails/{email}', [EmailController::class, 'show'])->name('emails.show');
        Route::post('/emails/{email}/mark-as-read', [EmailController::class, 'markAsRead'])->name('emails.mark-as-read');
        Route::post('/emails/{email}/mark-as-unread', [EmailController::class, 'markAsUnread'])->name('emails.mark-as-unread');
        Route::delete('/emails/{email}', [EmailController::class, 'destroy'])->name('emails.destroy');

        // Dashboard route
        Route::get('/dashboard', function () {
            return view('dashboard.index');
        })->name('dashboard');

        // Project Routes
        Route::resource('project', ProjectController::class);

        // Profile routes
        Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile.index');
        Route::put('/profile', [AdminProfileController::class, 'update'])->name('profile.update');

        // PDF route
        Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->name('generate.pdf');
    });
});

