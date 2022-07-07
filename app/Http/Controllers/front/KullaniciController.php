<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kullanici;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
            'email'=>'required|email|unique:kullanicis',
            'sifre'=>'required|confirmed|min:5|max:15',
            
           
            
           ]);
        $kullanici=kullanici::create([
            'adsoyad'=>$request->adsoyad,
            'email'=>$request->email,
            'sifre'=>Hash::make($request->sifre),
            'aktivasyon_anahtari'=>Str::random(60),
            'aktif_mi'=>0

        ]);
        Auth::login($kullanici);
        return redirect()->route('front.index');
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
