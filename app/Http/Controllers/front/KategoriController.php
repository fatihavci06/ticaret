<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategori;
use App\Models\kategori_urun;

class KategoriController extends Controller
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
    public function ana_kategori($slug){
        $data=kategori::whereSlug($slug)->firstOrFail();
        $tumurunler=kategori_urun::with('urun_bilgisi')->where('kategori_id',$data->id)->get();
        $altkategoriurunler=kategori::with('kat.urunler')->where('id',$data->id)->get();
        return $altkategoriurunler;
    }
    public function unique_multidim_array($array, $key) {
        $temp_array = array();
        $i = 0;
        $key_array = array();
       
        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }
    public function kategori($slug_kategori,$slug_altkategori='')
    {
     
        $altkategorivarmi=kategori::with('kat')->select('id','kategori_adi','ust_id')->where('slug',$slug_kategori)->firstorFail();
        $altkategorisayi=$altkategorivarmi->kat->count();
        
       if($slug_altkategori!=''){
         $kategori=kategori::select('id','kategori_adi','ust_id')->where('slug',$slug_altkategori)->firstorFail();
        $urunlist=$kategori->urunler;
        
        $anakategori=kategori::select('kategori_adi')->where('id',$kategori->ust_id)->first();
        $altkategoriler=kategori::where('ust_id',$kategori->id)->get();
        $kategori_ad=$kategori->kategori_adi;
       }
       else if($altkategorisayi==0){
        $data=kategori::whereSlug($slug_kategori)->firstOrFail();
        $urunler=kategori_urun::with('urun_bilgisi')->where('kategori_id',$data->id)->get();
        $urunlist = array();
        
        foreach($urunler  as $u){
           
            array_push($urunlist,$u->urun_bilgisi);
        }
        return view('front.kategori',['altkategoriler'=>$data->kat,'kategoriadi'=>'-','urunler'=>$urunlist ,'anakategori'=>$data->kategori_adi,'anakategori_slug'=>$data->slug ]);
       }
       else{
        $kategori=kategori::with('kat.urunler')->where('slug',$slug_kategori)->firstOrfail();
         $anakategori=kategori::select('kategori_adi')->where('slug',$slug_kategori)->first();
        $altkategoriler=$kategori->kat;
        $urunlist = array();
        $kategori_ad='-';
        
       // $liste=$kategori->kat[0]->urunler;
       
        foreach($kategori->kat as $k){
            foreach($k->urunler as $u)
                
                array_push($urunlist,$u);
            
           
        }
        
       }
      
      
       $urunlist=$this->unique_multidim_array($urunlist,'id');// bu fonksiyon aynı iddeki tekrar eden verileri siler

       
       
       
       
        return view('front.kategori',['altkategoriler'=>$altkategoriler,'kategoriadi'=>$kategori_ad,'urunler'=>$urunlist ,'anakategori'=>$anakategori->kategori_adi ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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