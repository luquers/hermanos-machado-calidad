<?php

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

use App\Http\Controllers\AuditController\AuditController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChapterController\ChapterController;
use App\Http\Controllers\DocumentController\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProcedureController\ProcedureController;
use App\Http\Controllers\TemplateController\TemplateController;
use App\Http\Controllers\UserController\UserController;

use App\Http\Controllers\versionController\versionController;
use L5Swagger\Http\Controllers\SwaggerController;

Route::group(['middleware' => 'web'], function () {
    Route::get('api/documentation', [SwaggerController::class, 'api'])->name('l5swagger.api');
});

Route::middleware('auth')->group(function() {
    Route::get('/', [HomeController::class, 'index']);

    Route::group(['middleware' => 'role:admin'], function () {
        Route::get('user/{user}/restore', [UserController::class, 'restore'])->name('user.restore');
        Route::resource('user', UserController::class);
    });

    Route::group(['prefix' => 'procedure', 'middleware' => 'role:admin|manager'], function () {
        Route::get('create/{chapter}', [ProcedureController::class, 'create'])->name('procedure.create');
        Route::post('create/{chapter}', [ProcedureController::class, 'store'])->name('procedure.store');
        Route::get('{procedure}/edit', [ProcedureController::class, 'edit'])->name('procedure.edit');
        Route::put('edit/{procedure}', [ProcedureController::class, 'update'])->name('procedure.update');
        Route::delete('list/{procedure}', [ProcedureController::class, 'destroy'])->name('procedure.destroy');
    });
    Route::get('procedure/list/{chapter}', [ProcedureController::class, 'index'])->name('procedure.index');
    Route::get('procedure/download/{procedure}', [ProcedureController::class, 'download'])->name('procedure.download');

    Route::group(['prefix' => 'document', 'middleware' => 'role:admin|manager'], function () {
        Route::get('create/{procedure}', [DocumentController::class, 'create'])->name('document.create');
        Route::post('create/{procedure}', [DocumentController::class, 'store'])->name('document.store');
        Route::get('{document}/edit', [DocumentController::class, 'edit'])->name('document.edit');
        Route::put('edit/{document}', [DocumentController::class, 'update'])->name('document.update');
        Route::delete('list/{document}', [DocumentController::class, 'destroy'])->name('document.destroy');
    });
    Route::get('document/list/{procedure}', [DocumentController::class, 'index'])->name('document.index');
    Route::get('document/download/{document}', [DocumentController::class, 'download'])->name('document.download');


    Route::group(['prefix' => 'version', 'middleware' => 'role:admin|manager'], function () {
        Route::get('create/{document}', [VersionController::class, 'create'])->name('version.create');
        Route::post('create/{document}', [VersionController::class, 'store'])->name('version.store');
        Route::get('{version}/edit', [VersionController::class, 'edit'])->name('version.edit');
        Route::put('edit/{version}', [VersionController::class, 'update'])->name('version.update');
    });
    Route::get('version/list/{document}', [VersionController::class, 'index'])->name('version.index');

    Route::group(['prefix' => 'chapter', 'middleware' => 'role:admin|manager'], function () {
        Route::get('create', [ChapterController::class, 'create'])->name('chapter.create');
        Route::post('create', [ChapterController::class, 'store'])->name('chapter.store');
        Route::get('{chapter}/edit', [ChapterController::class, 'edit'])->name('chapter.edit');
        Route::put('edit/{chapter}', [ChapterController::class, 'update'])->name('chapter.update');
        Route::delete('list/{chapter}', [ChapterController::class, 'destroy'])->name('chapter.destroy');
        Route::get('chapter/{chapter}/restore', [ChapterController::class, 'restore'])->name('chapter.restore');
    });
    Route::get('chapter', [ChapterController::class, 'index'])->name('chapter.index');



    Route::get('components', [TemplateController::class, 'components']);
});

Route::resource('audit', AuditController::class)->middleware('role:admin');

Route::post('/login/validate', [LoginController::class, 'validate_api']);

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Auth::routes([
    'register' => false,
]);


