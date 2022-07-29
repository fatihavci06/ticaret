<?php

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


Route::get('/','App\Http\Controllers\front\IndexController@index')->name('front.index');
Route::get('kategori/{slug_kategori}','App\Http\Controllers\front\KategoriController@kategori')->name('front.kategori');
Route::get('urun-detay/{slug}','App\Http\Controllers\front\UrunController@urun_detay')->name('front.urun_detay');


Route::group(['middleware'=>'auth'],function(){
        Route::get('odeme/','App\Http\Controllers\front\IndexController@odeme')->name('front.odeme');
        Route::get('siparisler/','App\Http\Controllers\front\IndexController@siparisler')->name('front.siparisler');
        Route::get('siparisler/{id}','App\Http\Controllers\front\SiparisController@siparis_detay')->name('front.siparis_detay');
       
});
Route::group(['prefix'=>'sepet','middleware'=>'auth'],function(){
        
        Route::get('/','App\Http\Controllers\front\SepetController@index')->name('front.sepet');
        Route::post('/guncelle/{id}','App\Http\Controllers\front\SepetController@guncelle')->name('front.sepet_guncelle');
        Route::post('/ekle','App\Http\Controllers\front\SepetController@ekle')->name('front.sepete_ekle');
        Route::post('/kaldir/{rowID}/{kullanici_id}','App\Http\Controllers\front\SepetController@kaldir')->name('front.sepet_kaldir');
        Route::post('/bosalt/{kullanici_id}','App\Http\Controllers\front\SepetController@bosalt')->name('front.sepet_bosalt');
});



Route::get('test','App\Http\Controllers\front\UrunController@index')->name('front.urunindex');
Route::post('arama','App\Http\Controllers\front\UrunController@search')->name('front.arama');
Route::get('arama','App\Http\Controllers\front\UrunController@search')->name('front.arama.get');
Route::group(['prefix'=>'kullanici'],function(){
Route::get('oturumac','App\Http\Controllers\front\KullaniciController@oturumac')->name('front.oturumac');
Route::get('sifremiunuttum','App\Http\Controllers\front\KullaniciController@sifremiunuttum')->name('front.sifremiunuttum');
Route::get('kaydol','App\Http\Controllers\front\KullaniciController@kaydol')->name('front.kaydol');
Route::post('kaydol','App\Http\Controllers\front\KullaniciController@kayit')->name('front.kaydolpost');
});
Route::get('aktiflestir/{aktivasyon_kodu}','App\Http\Controllers\front\KullaniciController@aktivasyon')->name('front.aktivasyon');
Route::get('test/mail',function(){
        $kullanici=App\Models\kullanici::findOrFail(1);
        return new App\Mail\KullaniciKayitMail($kullanici);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
