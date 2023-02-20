<?php

use App\Http\Controllers\ContactInformationController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\InstruksiTransaksiController;
use App\Http\Controllers\KetentuanSyaratController;
use App\Http\Controllers\KursRateController;
use App\Http\Controllers\SeoSettingController;
use App\Http\Controllers\SimcardProviderController;
use App\Http\Controllers\SocialmediaController;
use App\Http\Controllers\TestimoniController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('kurs-rate')->controller(KursRateController::class)->group(function () {
        Route::get('/', 'index')->name('kurs-rate.index');
        Route::get('/create', 'create')->name('kurs-rate.create');
        Route::post('/store', 'store')->name('kurs-rate.store');
        Route::get('/edit/{id}', 'edit')->name('kurs-rate.edit');
        Route::post('/update/{id}', 'update')->name('kurs-rate.update');
        Route::get('/delete/{id}', 'destroy')->name('kurs-rate.destroy');
    });

    Route::prefix('simcard-provider')->controller(SimcardProviderController::class)->group(function() {
        Route::get('/', 'index')->name('simcard_provider.index');
            Route::post('/store', 'store')->name('simcard_provider.store');
            Route::post('/update', 'update')->name('simcard_provider.update');
            Route::delete('/{post}/delete', 'destroy')->name('simcard_provider.destroy');
            Route::post('/upload_image', 'upload_image')->name('simcard_provider.uploadimage');
    });

    Route::prefix('kurs-rate')->controller(KursRateController::class)->group(function() {
        Route::post('/update', 'update')->name('kurs_rate.update');
    });

    Route::prefix('social_media')->controller(SocialmediaController::class)->group(function() {
        Route::get('/', 'index')->name('social_media.index');
        Route::post('/store', 'store')->name('social_media.store');
        Route::post('/update', 'update')->name('social_media.update');
        Route::delete('/{post}/delete', 'destroy')->name('social_media.destroy');
        Route::post('/upload_image', 'upload_image')->name('social_media.uploadimage');
    });

    Route::prefix('contact_information')->controller(ContactInformationController::class)->group(function() {
        Route::get('/', 'index')->name('contact.index');
    });

    Route::prefix('syarat_ketentuan')->controller(KetentuanSyaratController::class)->group(function() {
        Route::get('/', 'index')->name('ketentuan_syarat.index');
        Route::post('/upload_image', 'upload_image')->name('ketentuan_syarat.uploadimage');
    });

    Route::prefix('instruksi_transaksi')->controller(InstruksiTransaksiController::class)->group(function() {
        Route::get('/', 'index')->name('instruksi_transaksi.index');
        Route::post('/upload_image', 'upload_image')->name('instruksi_transaksi.uploadimage');
    });

    Route::prefix('seo_settings')->controller(SeoSettingController::class)->group(function() {
        Route::get('/', 'index')->name('seo_setting.index');
    });

    Route::prefix('faq')->controller(FaqController::class)->group(function() {
        Route::get('/', 'index')->name('faq.index');
        Route::post('/store', 'store')->name('faq.store');
        Route::post('/update', 'update')->name('faq.update');
        Route::delete('/{post}/delete', 'destroy')->name('faq.destroy');
    });

    Route::prefix('testimoni')->controller(TestimoniController::class)->group(function() {
        Route::get('/', 'index')->name('testimoni.index');
        Route::post('/store', 'store')->name('testimoni.store');
        Route::post('/update', 'update')->name('testimoni.update');
        Route::delete('/{post}/delete', 'destroy')->name('testimoni.destroy');
    });
});

require __DIR__.'/auth.php';
