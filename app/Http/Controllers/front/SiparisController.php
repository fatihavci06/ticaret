<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siparisler;
use App\Models\SiparisUrun;
use DB;
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
     
   
        $data= Siparisler::with('siparisurun:siparis_id,adet')->where('sepet_id',auth()->id())->get();
       
        return view('front.siparisler',['siparisler'=>$data]);
    }
    public static  function sepeturunadet($siparis_id)
    {
       $adet=DB::table('siparis_uruns')
        ->where('siparis_id', '=', $siparis_id)
        ->sum('adet');
        return $adet;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function siparis_detay($id)
    {
        //
       $data=SiparisUrun::with('urunbilgisi')->where('siparis_id',$id)->get();
        $siparis_tutari=Siparisler::select('siparis_tutari')->where('id',$id)->first();
        return view('front.siparis_detay',['data'=>$data,'siparis_tutari'=>$siparis_tutari,'siparis_id'=>$id]);
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
