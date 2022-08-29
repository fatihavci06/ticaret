<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siparisler;
use App\Models\Urun;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Cache;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function oturumac()
    {
        //
        return view('back.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    $bitiszamani=now()->addMinutes(10);
    $istatistikler=Cache::remember('istatistikler',$bitiszamani,function(){
      return   $istatistikler=[
         'bekleyen'=>$bekleyen=Siparisler::where('durum','Siparişiniz alındı')->count(),
       'tamamlanan'=> $tamamlanan=Siparisler::where('durum','Sipariş Tamamlandı')->count(),
        'urunsayisi'=>$urunsayisi=Urun::count(),
        'kullanici'=>$kullanici=User::count()
         ];
});
   
        return view('back.index',['istatistikler'=>$istatistikler]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            
            'email'=>'required|email',
            'password'=>'required',
           ]);
        if (Auth::guard('yonetim')->attempt(['email' => $request->email, 'password' => $request->password,'yoneticimi'=>1])) {
    // Authentication was successful...
            return redirect()->route('back.index');
         }
         else{
            return redirect()->route('back.login')->with(['mesaj'=>'yönetici değilsiniz']);
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        //
         Auth::guard('yonetim')->logout();
        return redirect()->route('back.login');
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
