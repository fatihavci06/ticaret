<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kullanici;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Mail\KullaniciKayitMail;
use Mail;
class KullaniciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function oturumac()
    {
        //
        return view('front.oturumac');
    }
    public function sifremiunuttum()
    {
        //
        return view('front.sifremiunuttum');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function kaydol()
    {
        //
       
        return view('front.kaydol');
    }
    public function kayit(Request $request)
    {
        //
        
        $request->validate([
            'adsoyad'=>'required|min:5|max:60',
            'email'=>'required|email|unique:users',
            'sifre'=>'required|confirmed|min:5|max:15',
            
           
            
           ]);
        $kullanici=new User;
        $kullanici->name=$request->adsoyad;
        $kullanici->email=$request->email;
        $kullanici->password=Hash::make($request->sifre);
        $kullanici->aktivation_code=Str::random(60);
        $kullanici->isAktive=0;
           $kullanici->save();
            
        Mail::to($request->email)->send(new KullaniciKayitMail($kullanici) );
       
        return redirect()->back()->with(['mesaj'=>'Mail adresinize aktivasyon linki gönderildi']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function aktivasyon($aktivasyon_kodu)
    {
        //
        $data=User::where('aktivation_code',$aktivasyon_kodu)->first();
        if(!is_null($data)){
            $data->isAktive=1;
            $data->aktivation_code=null;
            $data->save();
            Auth::login($data);
            return redirect()->route('front.index')->with(['mesaj'=>'Aktivasyon başarılı','success'=>true]);
        }
        else{
            return redirect()->route('front.index')->with(['mesaj'=>'Aktivasyon daha önce yapılmış','success'=>false]);
        }
       

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
