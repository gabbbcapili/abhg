<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SubscriptionController;


Route::get('/', [HomeController::class, 'index'])->name('index')->middleware('auth')->name('home');
Route::get('/customcard/{card:name}/{page_url}', [CardController::class, 'show'])->name('card.show');

Route::get('/subscription/notfound', [SubscriptionController::class, 'notfound'])->name('subscription.notfound');


Route::group(['middleware' => ['auth']], function()
{
    Route::resource('/card', CardController::class)->except(['show'])->middleware('subscribed');
    Route::resource('/contact', ContactController::class);

    Route::get('/card/downloadqr/{card}', [CardController::class, 'downloadqr'])->name('card.downloadqr');
    Route::POST('/card/updateDesign/{card}', [CardController::class, 'updateDesign'])->name('card.updateDesign');



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

    Route::get('/design/getGroup/{group}', [DesignController::class, 'getGroup'])->name('design.getGroup');

    Route::get('/plan/checkout/{plan}', [PlanController::class, 'checkout'])->name('plan.checkout');

    Route::post('/plan/store/{plan}', [PlanController::class, 'store'])->name('plan.store');
    Route::get('/plan/invoice/{subscription}', [PlanController::class, 'invoice'])->name('plan.invoice');

    Route::resource('/subscription', SubscriptionController::class);
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
