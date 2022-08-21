<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategori;
use Str;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function kategori_sayi(){ //dışarıdan fonksiyonun çağrılabilmesi için mutlaka public static olmalı
       return kategori::count();
            
        }
    public function index()
    {
        //
         $data=kategori::with('ust_kategori:id,kategori_adi')->paginate(8);
        return view('back.kategori.liste',['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ara(Request $request)
    {
        //


       


        

        if(empty($request->ara)){
            return redirect()->back();
        }
       $aranan=$request->ara;
        $data=kategori::with('ust_kategori:id,kategori_adi')->where('kategori_adi','like','%'.$aranan.'%')->orWhereHas('ust_kategori', function ($query) use ($aranan) {
        $query->where('kategori_adi','like','%'.$aranan.'%');
    });
        $request->flash();
        $sayi=$data->count();
        return view('back.kategori.liste',['data'=>$data->paginate(8),'sayi'=>$sayi.' adet sonuç bulundu.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ekle(Request $request)
    {
        //
        $ust_kategori=kategori::select('id','ust_id','kategori_adi')->whereNull('ust_id')->get();
        return view('back.kategori.ekle',['ust_kategoriler'=>$ust_kategori]);
    }
    public function store(Request $request)
    {
        //
        
        if($request->ust_id==0){
            $ust_id=null;
        }
        else{
             $ust_id=$request->ust_id;
        }
        if(empty($request->slug)){
             $slug=Str::slug($request->kategori);
             $request->merge(['slug' => $slug]);
        }
        else{
            $slug=Str::slug($request->slug);
            $request->merge(['slug' => $slug]);
        }
       
        $request->validate([
            
            'kategori' => 'required',
            'slug' => "unique:kategoris,slug",
           
           ]);

        if(kategori::where('slug',Str::slug($request->kategori))->count()>0){
            $slug=Str::slug($request->kategori);
            $rasgele=rand(1,100);
            $slug=$slug.'-'.$rasgele;
        }
        else{
            $slug=Str::slug($request->slug);
        }
       
       $save=kategori::create([
            'kategori_adi'=>$request->kategori,
            'ust_id'=>$ust_id,
            'slug'=>$slug,
       ]);

        return redirect()->back()->with(['mesaj'=>'Kayıt başarılı']);





       
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
        $data=kategori::findOrFail($id);
         $ust_kategori=kategori::select('id','ust_id','kategori_adi','slug')->whereNull('ust_id')->where('id','!=',$id)->get();
        return view('back.kategori.edit',['data'=>$data,'ust_kategoriler'=>$ust_kategori]);

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
         if($request->ust_id==0){
            $ust_id=null;
        }
        else{
             $ust_id=$request->ust_id;
        }

         if(empty($request->slug)){
             $slug=Str::slug($request->kategori);
             $request->merge(['slug' => $slug]);
        }
        else{
            $slug=Str::slug($request->slug);
            $request->merge(['slug' => $slug]);
        }
       
        $request->validate([
            
            'kategori' => 'required',
            'slug' => "unique:kategoris,slug,{$id}",
           
           ]);

        

       
       $data=kategori::find($id);

       $save=$data->update([
            'kategori_adi'=>$request->kategori,
            'ust_id'=>$ust_id,
            'slug'=>$slug,
       ]);
         return redirect()->back()->with(['mesaj'=>'Düzenleme başarılı']);

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
    public function destroy($id)
    {
        //
        $data=kategori::find($id);
        $data->urunler()->detach();

        $data->delete();
        return redirect()->back()->with('mesaj','silindi');
    }
}
