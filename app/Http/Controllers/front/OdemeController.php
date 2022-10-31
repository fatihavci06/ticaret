<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\KullaniciDetay;
use App\Models\User;
use App\Models\SepetUrun;
use App\Models\SiparisUrun;
use App\Models\siparisler;
class OdemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(count(Cart::content())==0){
            return redirect()->route('front.index')->with(['success'=>1,'mesaj'=>'hacım sepette ürün yok']);
        }
        
      $kullanici_detay=User::with('kullanicidetay')->where('id',auth()->id())->first();
        return view('front.odeme',['kullanici_detay'=>$kullanici_detay]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function odemeyap(Request $request)
    {
        //
        
        
      $siparis=siparisler::create([
            'sepet_id'=>auth()->id(),
            'siparis_tutari'=>Cart::total(),
            'durum'=>'Siparişiniz alındı',
            'adsoyad'=>$request->adsoyad,
            'adres'=>$request->adres,
            'telefon'=>$request->telefon,
            'ceptelefonu'=>$request->ceptelefonu,
            'banka'=>'Garanti Bankası',
            'taksit_sayisi'=>1


        ]);
        $sepettekiurunler=SepetUrun::where('kullanici_id',auth()->id())->get();
        foreach($sepettekiurunler as $s){
            SiparisUrun::create([
                'kullanici_id'=>auth()->id(),
                'urun_id'=>$s->urun_id,
                'adet'=>$s->adet,
                'tutar'=>$s->tutar,
                'durum'=>'Sipariş Oluşturuldu',
                'siparis_id'=>$siparis->id
            ]);

        }

        foreach($sepettekiurunler as $s){
             $s->delete();
        }
        return redirect()->route('front.siparisler')->with(['success'=>1,'mesaj'=>'Siparişiniz alındı']);

       

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
