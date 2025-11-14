<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\SkillSectionController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ContactController;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', function () {
    return view('portfolio');
});

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('about', AboutSectionController::class);
    
    Route::get('/hero', [HeroSectionController::class, 'index'])->name('hero.index');
    Route::get('/hero/create', [HeroSectionController::class, 'create'])->name('hero.create');
    Route::post('/hero/store', [HeroSectionController::class, 'store'])->name('hero.store');
    Route::get('/hero/{hero}/edit', [HeroSectionController::class, 'edit'])->name('hero.edit');
    Route::put('/hero/{hero}', [HeroSectionController::class, 'update'])->name('hero.update');
    Route::delete('/hero/{hero}', [HeroSectionController::class, 'destroy'])->name('hero.destroy');
   
    Route::get('/skills', [SkillSectionController::class, 'index'])->name('skills.index');
    Route::get('/skills/create', [SkillSectionController::class, 'create'])->name('skills.create');
    Route::post('/skills', [SkillSectionController::class, 'store'])->name('skills.store');
    Route::get('/skills/{id}/edit', [SkillSectionController::class, 'edit'])->name('skills.edit');
    Route::put('/skills/{id}', [SkillSectionController::class, 'update'])->name('skills.update');
    Route::delete('/skills/{id}', [SkillSectionController::class, 'destroy'])->name('skills.destroy');
    Route::resource('experiences', ExperienceController::class);
    Route::resource('contacts', ContactController::class);
    
});

Route::get('/run-setup', function () {
    Artisan::call('migrate', ['--force' => true]);
    Artisan::call('db:seed', ['--force' => true]);

    return "Migration + Seeding completed.";
});
