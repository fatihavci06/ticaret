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
Route::get('kategori/{slug}','App\Http\Controllers\front\KategoriController@kategori')->name('front.kategori');
Route::get('urun-detay/{slug}','App\Http\Controllers\front\UrunController@urun_detay')->name('front.urun_detay');

Route::get('fotocek','App\Http\Controllers\front\KategoriController@fotocek')->name('front.fotocek');
Route::group(['middleware'=>'auth'],function(){
        Route::get('odeme/','App\Http\Controllers\front\OdemeController@index')->name('front.odeme');
        Route::post('odemeyap/','App\Http\Controllers\front\OdemeController@odemeyap')->name('front.odemeyap');
        Route::get('siparisler/','App\Http\Controllers\front\SiparisController@index')->name('front.siparisler');
        Route::get('siparisler/{id}','App\Http\Controllers\front\SiparisController@siparis_detay')->name('front.siparis_detay');
       
});
Route::group(['prefix' => 'yonetim'], function() {
        Route::redirect('/','/yonetim/oturumac');
        Route::get('oturumac/','App\Http\Controllers\back\AdminController@oturumac')->name('back.oturumac');
        Route::post('oturumac/','App\Http\Controllers\back\AdminController@login')->name('back.login');
        Route::get('oturumukapat/','App\Http\Controllers\back\AdminController@logout')->name('back.logout');
       
        Route::group(['middleware' => 'buyoneticimi'], function() {
                 Route::get('anasayfa/','App\Http\Controllers\back\AdminController@index')->name('back.index');

                 Route::group(['prefix' => 'kullanici'], function() {
             
                 Route::get('liste/','App\Http\Controllers\back\KullaniciKontroller@index')->name('kullanici.index');
                  Route::get('ekle/','App\Http\Controllers\back\KullaniciKontroller@ekle')->name('kullanici.ekle.form');
                   Route::post('ekle/','App\Http\Controllers\back\KullaniciKontroller@store')->name('kullanici.ekle');
                 Route::get('duzenle/{id}','App\Http\Controllers\back\KullaniciKontroller@edit')->name('kullanici.edit');
                 Route::post('guncelle/{id}','App\Http\Controllers\back\KullaniciKontroller@update')->name('kullanici.duzenle');
                 Route::get('ara/','App\Http\Controllers\back\KullaniciKontroller@ara')->name('kullanici.ara');

                 Route::get('sil/{id}','App\Http\Controllers\back\KullaniciKontroller@destroy')->name('kullanici.sil');
                 
        }); 

                 Route::group(['prefix' => 'kategori'], function() {
             
                 Route::get('liste/','App\Http\Controllers\back\KategoriController@index')->name('kategori.index');
                  Route::get('ekle/','App\Http\Controllers\back\KategoriController@ekle')->name('kategori.ekle.form');
                   Route::post('ekle/','App\Http\Controllers\back\KategoriController@store')->name('kategori.ekle');
                 Route::get('duzenle/{id}','App\Http\Controllers\back\KategoriController@edit')->name('kategori.edit');
                 Route::post('guncelle/{id}','App\Http\Controllers\back\KategoriController@update')->name('kategori.duzenle');
                 Route::get('ara/','App\Http\Controllers\back\KategoriController@ara')->name('kategori.ara');
                 Route::get('sil/{id}','App\Http\Controllers\back\KategoriController@destroy')->name('kategori.sil');
                 
        }); 

                  Route::group(['prefix' => 'urun'], function() {
             
                 Route::get('liste/','App\Http\Controllers\back\UrunController@index')->name('urun.index');
                  Route::get('ekle/','App\Http\Controllers\back\UrunController@ekle')->name('urun.ekle.form');
                   Route::post('ekle/','App\Http\Controllers\back\UrunController@store')->name('urun.ekle');
                 Route::get('duzenle/{id}','App\Http\Controllers\back\UrunController@edit')->name('urun.edit');
                 Route::post('guncelle/{id}','App\Http\Controllers\back\UrunController@update')->name('urun.duzenle');
                 Route::get('ara/','App\Http\Controllers\back\UrunController@ara')->name('urun.ara');
                   Route::get('altkategori','App\Http\Controllers\back\UrunController@altkategori')->name('kategori.cek');
                 Route::get('sil/{id}','App\Http\Controllers\back\UrunController@destroy')->name('urun.sil');
                 
        }); 

                   Route::group(['prefix' => 'siparis'], function() {
             
                 Route::get('liste/','App\Http\Controllers\back\SiparisController@index')->name('back.siparis.index');
                  Route::get('ekle/','App\Http\Controllers\back\SiparisController@ekle')->name('back.siparis.ekle.form');
                   Route::post('ekle/','App\Http\Controllers\back\SiparisController@store')->name('back.siparis.ekle');
                 Route::get('duzenle/{id}','App\Http\Controllers\back\SiparisController@edit')->name('back.siparis.edit');
                 Route::post('guncelle/{id}','App\Http\Controllers\back\SiparisController@update')->name('back.siparis.duzenle');
                 Route::get('ara/','App\Http\Controllers\back\SiparisController@ara')->name('siparis.ara');
                   Route::get('altkategori','App\Http\Controllers\back\SiparisController@altkategori')->name('back.kategori.cek');
                 Route::get('sil/{id}','App\Http\Controllers\back\SiparisController@destroy')->name('back.siparis.sil');
                 
        }); 



        }); 
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
