<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\urun;
use App\Models\kategori;
use App\Models\kategori_urun;
use App\Models\Image;
use App\Models\urun_detay;
 use Illuminate\Support\Facades\Storage;
use Str;
class UrunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public static function urun_sayi(){ //dışarıdan fonksiyonun çağrılabilmesi için mutlaka public static olmalı
       return urun::count();
            
        }
        
    public function index()
    {
        //

    $data=urun::select(['uruns.id','uruns.urun_adi','uruns.slug','uruns.fiyat','k.kategori_adi','uruns.created_at'])->join('kategori_uruns as ku','ku.urun_id','uruns.id')
    ->leftJoin('kategoris as k','k.id','ku.kategori_id')
    ->paginate(8);
                   
                    
     
        return view('back.urunler.liste',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ara(Request $request)
    {
        //


       
     
       $aranan=$request->ara;

      $data=urun::select(['uruns.id','uruns.urun_adi','uruns.slug','uruns.fiyat','k.kategori_adi','uruns.created_at'])->join('kategori_uruns as ku','ku.urun_id','uruns.id')
         ->leftJoin('kategoris as k','k.id','ku.kategori_id')
         ->where('uruns.urun_adi','like','%'.$aranan.'%')
         ->orWhere('k.kategori_adi','like','%'.$aranan.'%');

         


       
        $request->flash();
        $sayi=$data->count();
        return view('back.urunler.liste',['data'=>$data->paginate(8),'sayi'=>$data->count().' adet sonuç bulundu.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ekle()
    {
        //
        $kategoriler=kategori::whereNull('ust_id')->get();
        return view('back.urunler.ekle',['kategoriler'=>$kategoriler]);
    }
    public function altkategori(Request $request)
    {
        //
        $id=$request->id;
       $data=kategori::where('ust_id',$id)->get();
        return response()->json(['altkategoriler'=>$data,'count'=>$data->count()]);

       
    }
    public function store(Request $request)
    {
        //


        if(empty($request->slug)){
             $slug=Str::slug($request->urun_adi);
             $request->merge(['slug' => $slug]);
        }
        else{
            $slug=Str::slug($request->slug);
            $request->merge(['slug' => $slug]);
        }
       
        $request->validate([
            
            'urun_adi' => 'required',
            'fiyat' => 'required',
             'aciklama' => 'required',
            'slug' => "unique:uruns,slug",
            'ust_id'=>'required',
             'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
           
           ]);


        $data=new urun;
        $data->urun_adi=$request->urun_adi;
        $data->slug=$slug;
        
        $data->aciklama=$request->aciklama;
        $data->fiyat=$request->fiyat;
        $data->save();

         $urun_detay=new urun_detay;
         $urun_detay->urun_id=$data->id;
         $urun_detay->goster_slider=$request->goster_slider;
         $urun_detay->goster_gunun_firsati=$request->goster_slider;
         $urun_detay->goster_one_cikan=$request->goster_one_cikan;
         $urun_detay->goster_cok_satan=$request->goster_cok_satan;
         $urun_detay->goster_indirimli=$request->goster_indirimli;
         
         $urun_detay->save();
        if(!empty($request->file('image'))){

            foreach($request->file('image') as $file){
                $img=new Image;
                $img->image=Storage::putFile('images', $file);  //storage burda
                $img->urun_id=$data->id;
                $img->save();
            }
            
        }

        

        
        $varmi=kategori_urun::where('urun_id',$data->id)->count();

        if($varmi>0){
            return redirect()->back()->with('mesaj','hata var');
        }
        else{
            kategori_urun::insert([
                'urun_id'=>$data->id,
                'kategori_id'=>$request->ust_id
            ]);
        }
        return redirect()->back()->with('mesaj','eklendi');
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
       
       $data=urun::with('detay')->findOrFail($id);
       

       $kategorisi=kategori_urun::with('kategori_bilgisi')->where('urun_id',$id)->first();
        return view('back.urunler.edit',['data'=>$data,'kategorisi'=>$kategorisi]);
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
        if(empty($request->slug)){
             $slug=Str::slug($request->urun_adi);
             $request->merge(['slug' => $slug]);
        }
        else{
            $slug=Str::slug($request->slug);
            $request->merge(['slug' => $slug]);
        }
       
        $request->validate([
            
            'urun_adi' => 'required',
            'fiyat' => 'required',
             'aciklama' => 'required',
            'slug' => "unique:uruns,slug,{$id}",
            'ust_id'=>'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
           
           ]);


        $data=urun::findOrFail($id);
        $data->urun_adi=$request->urun_adi;
        $data->slug=$slug;
        
        $data->aciklama=$request->aciklama;
        $data->fiyat=$request->fiyat;
        $data->save();

         $urun_detay=urun_detay::where('urun_id',$id)->first();
         $urun_detay->goster_slider=$request->goster_slider;
         $urun_detay->goster_gunun_firsati=$request->goster_slider;
         $urun_detay->goster_one_cikan=$request->goster_one_cikan;
         $urun_detay->goster_cok_satan=$request->goster_cok_satan;
         $urun_detay->goster_indirimli=$request->goster_indirimli;
         
         $urun_detay->save();
        if(!empty($request->file('image'))){

            $image=Image::where('urun_id',$id)->get();
            foreach($image as $i){
                Storage::delete($i->image);
                $i->delete();
            }

            foreach($request->file('image') as $file){
                $img=new Image;
                $img->image=Storage::putFile('images', $file);  //storage burda
                $img->urun_id=$data->id;
                $img->save();
            }
            
        }

        

        
        $ku=kategori_urun::where('urun_id',$id)->first();
            $ku->kategori_id=$request->ust_id;
            $ku->urun_id=$id;
            $ku->save();
        return redirect()->back()->with('mesaj','eklendi');

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

        $foto=Image::where('urun_id',$id)->get();
        foreach($foto as $f){
             Storage::delete($f->image);
        }
        $data=urun::find($id);
        $data->delete();
     
        return redirect()->back()->with('mesaj','silindi');
    }
}
