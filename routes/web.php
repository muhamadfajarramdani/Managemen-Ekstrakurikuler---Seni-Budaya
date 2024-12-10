<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\UserControlller;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\SeniBudayaController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\ArtController;
use App\Http\Controllers\CartController;

Route::get('/', [UserControlller::class, 'showlogin'])->name('login');
Route::post('/login', [UserControlller::class, 'loginAuth'])->name('login.proses');
Route::middleware(IsAdmin::class)->group(function () {
    Route::get('/landing', [LandingPageController::class, 'index'])->name('landing_page');
    Route::get('/logout', [UserControlller::class, 'logout'])->name('logout');

    Route::resource('/ekstrakurikuler', EkstrakurikulerController::class);
    Route::prefix('/senibudaya')->name('senbud.')->group(function () {
        Route::get('/data', [SeniBudayaController::class, 'index'])->name('data');
        Route::get('/tambah', [SeniBudayaController::class, 'create'])->name('create');
        Route::post('/tambah', [SeniBudayaController::class, 'store'])->name('tambah_senibudaya');
        Route::delete('/hapus/{id}', [SeniBudayaController::class, 'destroy'])->name('hapus');
        Route::get('/edit/{id}', [SeniBudayaController::class, 'edit'])->name('edit');
        Route::patch('/edit/{id}', [SeniBudayaController::class, 'update'])->name('edit.formulir');
    });


    Route::get('/data-eskrakurikuler/export-excel', [EkstrakurikulerController::class, 'exportExcelEkstrakurikuler'])->name('export_excel_ekstrakurikuler');
    Route::get('/data-senibudaya/export-excel', [SeniBudayaController::class, 'exportExcelSeniBudaya'])->name('export_excel_senibudaya');
    Route::get('/download-pdf/{id}', [EkstrakurikulerController::class, 'downloadPDF'])->name('download_pdf');
    Route::get('/download-pdf-senibudaya/{id}', [SeniBudayaController::class, 'downloadPDF'])->name('download_pdf_senbud');
});

Route::prefix('arts')->name('arts.')->group(function () {
    Route::get('/', [ArtController::class, 'index'])->name('index'); // Menampilkan semua karya seni
    Route::get('/create', [ArtController::class, 'create'])->name('create'); // Form tambah karya seni
    Route::post('/store', [ArtController::class, 'store'])->name('store'); // Simpan data baru
    Route::get('/art/{id}', [ArtController::class, 'show'])->name('show');// Menampilkan detail karya seni
    Route::get('/{art}/edit', [ArtController::class, 'edit'])->name('edit'); // Form edit karya seni
    Route::put('/{art}', [ArtController::class, 'update'])->name('update'); // Update karya seni
    Route::delete('/{art}', [ArtController::class, 'destroy'])->name('destroy'); // Hapus karya seni
    Route::get('/keranjang', [ArtController::class, 'cart'])->name('cart');
    Route::post('/cart/add/{id}', [ArtController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [ArtController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('arts.cart.update');

});






