<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategori;
use App\Models\urun_detay;
use App\Models\urun;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $slider=urun_detay::with('urun')->where('goster_slider',1)->take(5)->get();
        
        $kategoriler=kategori::whereNull('ust_id')->take(5)->get(); //null olan kayıtları döndürür
        
       $gunun_firsati=urun::join('urun_detays','urun_detays.urun_id','uruns.id')
                    ->where('urun_detays.goster_gunun_firsati',1)->orderByDesc('urun_detays.updated_at')->first();
         $one_cikan=urun::join('urun_detays','urun_detays.urun_id','uruns.id')
                    ->where('urun_detays.goster_one_cikan',1)->orderByDesc('urun_detays.updated_at')->take(5)->get();
       $cok_satan=urun::join('urun_detays','urun_detays.urun_id','uruns.id')
                    ->where('urun_detays.goster_cok_satan',1)->orderByDesc('urun_detays.updated_at')->take(5)->get();            
      $indirimli=urun::join('urun_detays','urun_detays.urun_id','uruns.id')
                    ->where('urun_detays.goster_indirimli',1)->orderByDesc('urun_detays.updated_at')->take(5)->get();             
        
        return view('front.index',['kategoriler'=>$kategoriler,'slider'=>$slider,'gunun_firsati'=>$gunun_firsati,'one_cikan'=>$one_cikan,'cok_satan'=>$cok_satan,'indirimli'=>$indirimli]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sepet()
    {
        return view('front.sepet');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function siparisler()
    {
        //
        return view('front.siparisler');
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
