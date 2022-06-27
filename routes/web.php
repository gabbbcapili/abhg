<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ContactController;


Route::get('/', [HomeController::class, 'index'])->name('index')->middleware('auth');
Route::get('/card/{card:name}/{page_url}', [CardController::class, 'show'])->name('card.show');


Route::group(['middleware' => ['auth']], function()
{
    Route::resource('/card', CardController::class)->except(['show']);
    Route::resource('/contact', ContactController::class);

    Route::get('/card/downloadqr/{card}', [CardController::class, 'downloadqr'])->name('card.downloadqr');



    Route::get('/page/delete/{page}', [PageController::class, 'delete'])->name('page.delete');
    Route::get('page/{card}', [PageController::class, 'index'])->name('page.index');
    Route::get('page/content/{page}', [PageController::class, 'content'])->name('page.content');
    Route::get('page/phone/{page}', [PageController::class, 'phone'])->name('page.phone');
    Route::post('page/updateSort/{card}', [PageController::class, 'updateSort'])->name('page.updateSort');
    Route::get('page/create/{card}', [PageController::class, 'create'])->name('page.create');
    Route::post('page/{card}', [PageController::class, 'store'])->name('page.store');
    Route::put('page/updateName/{page}', [PageController::class, 'updateName'])->name('page.updateName');
    Route::get('page/editName/{page}', [PageController::class, 'editName'])->name('page.editName');
    Route::resource('/page', PageController::class)->except(['store', 'create', 'index']);


    Route::get('/block/create/{page}', [BlockController::class, 'create'])->name('block.create');
    Route::get('/block/create/{page}/{type}', [BlockController::class, 'createType'])->name('block.create.type');
    Route::post('/block/{page}', [BlockController::class, 'store'])->name('block.store');
    Route::post('block/updateSort/{page}', [BlockController::class, 'updateSort'])->name('block.updateSort');
    Route::get('/block/delete/{block}', [BlockController::class, 'delete'])->name('block.delete');
    Route::delete('/block/{block}', [BlockController::class, 'destroy'])->name('block.destroy');

    Route::get('/media/delete/{media}', [MediaController::class, 'delete'])->name('media.delete');
    Route::get('/media/qcreate/{type}', [MediaController::class, 'qcreate'])->name('media.qcreate');
    Route::post('/media/upload/{type}', [MediaController::class, 'upload'])->name('media.upload');
    Route::resource('/media', MediaController::class)->parameters(['media' => 'media']);
});


// Route::domain('{subdomain}.example.com')->group(function () {
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
