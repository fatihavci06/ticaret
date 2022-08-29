<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siparisler;
use App\Models\SiparisUrun;
class SiparisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $data= Siparisler::with('siparisurun:siparis_id,adet')->orderBy('created_at','desc')->paginate(2);

      return view('back.siparisler.liste',['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function siparis_sayi(){ //dışarıdan fonksiyonun çağrılabilmesi için mutlaka public static olmalı
       return Siparisler::count();
            
        }
    public function ara(Request $request)
    {
        //
       $data=Siparisler::where('adsoyad','like','%'.$request->ara.'%')->orWhere('durum','like','%'.$request->ara.'%')->paginate(5);
         return view('back.siparisler.liste',['data'=>$data]);
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
       /* $siparisurun=SiparisUrun::where('siparis_id',$id)->get();*/
       $data=siparisler::with('siparisurun')->find($id);
        return view('back.siparisler.edit',['data'=>$data]);
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
         $request->validate([
            
            'adsoyad' => 'required',
            'telefon' => "required",
            'ceptelefonu' => "required",
           'adres' => "required",
           'durum' => "required",
           
           
           
           ]);


         $update=Siparisler::find($id)->update([
            'adsoyad'=>$request->adsoyad,
            'telefon'=>$request->telefon,
            'ceptelefonu'=>$request->ceptelefonu,
            'adres'=>$request->adres,
            'durum'=>$request->durum,
         ]);

         if($update){
            return redirect()->back()->with(['success'=>'Güncelleme Başarılı']);

         }
         else{
            return redirect()->back()->with(['success'=>'Güncelleme Başarısız']);
         }

        return $request->durum;
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

        $sil=Siparisler::find($id)->delete();
        return redirect()->back()->with(['success'=>'Silme Başarılı']);
    }
}
