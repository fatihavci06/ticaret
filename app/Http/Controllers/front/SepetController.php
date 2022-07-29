<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\urun;
use App\Models\Sepet;
use App\Models\SepetUrun;
use Gloudemans\Shoppingcart\Facades\Cart;
class SepetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        Cart::destroy(); //sepeti boşalttık ve veritabanındaki verilerle sepeti doldurduk
      $sepetim=SepetUrun::with('sepeturun')->where('kullanici_id',auth()->id())->get();
      foreach($sepetim as $s){
        Cart::add(['id'=>$s->id,'name'=>$s->sepeturun->urun_adi,'qty'=>$s->adet,'price'=>$s->sepeturun->fiyat,'weight'=>50,'options' => ['slug' => $s->sepeturun->slug,'urun_id'=>$s->sepeturun->id]]);
      }
      $sepetim=Cart::content();
        return view('front.sepet',['sepet'=>$sepetim]);
    }
    public function guncelle(Request $request,$id)
    {
        $validator = \Validator::make($request->all(), [
            'adet' => 'required|numeric|between:1,5'
               
           ]);
           if ($validator->fails())
         {
        return response()->json(['errors'=>'1-5 arası stok girebilirsiniz']);
        }
      
       
       
       /* $data=Cart::get($id); 
        $data=Cart::update($id,$request->adet);*/
     $urun= SepetUrun::where('kullanici_id',$request->kullanici_id)->where('urun_id',$request->urun_id)->first();
      $urun->adet=$request->adet;
      $urun->save();
      
    }
    public function ekle(Request $request)
    {
        //
    $urun=urun::find($request->id);
   session()->put('urun_id',$urun->id);  
  
         //Cart::add($urun->id, $urun->urun_adi, 1,$urun->fiyat, 0, ['size' => 'large']);
          $data=Cart::add(['id'=>$urun->id,'name'=>$urun->urun_adi,'qty'=>1,'price'=>$urun->fiyat,'weight'=>50,'options' => ['slug' => $urun->slug,'urun_id'=>$urun->id]]);
         
      if(auth()->check()){
            $kullanici_id=auth()->id();
            if(!isset($kullanici_id)){
                $aktif_sepet=Sepet::create(['kullanici_id'=>auth()->id()]);
                $aktif_sepet_id=$aktif_sepet->id;
                
            }
            SepetUrun::updateOrCreate(
                ['kullanici_id'=>$kullanici_id,'urun_id'=>$urun->id],//Eğer bunlar varsa güncelliyor yoksa yeni kayıt
                ['adet'=>$data->qty,'tutar'=>$data->price,'durum'=>'bekleme']
            );
      }
         return redirect()->route('front.sepet')->with('sepet','Urun Sepete Eklendi');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kaldir($rowID,$kullanici_id)
    {
        //
        
    $data=Cart::get($rowID);
     
        
        if(auth()->check()){
            SepetUrun::where('kullanici_id',$kullanici_id)->where('urun_id',$data->options->urun_id)->delete();
            Cart::remove($rowID);
        return redirect()->route('front.sepet')->with('sepet','Urun Sepetten Kaldırıldı');
        }
        
    }
    public function bosalt($kullanici_id)
    {
        //
        if(auth()->check()){
            Cart::destroy();
            SepetUrun::where('kullanici_id',$kullanici_id)->delete();
        }
        
        return redirect()->route('front.sepet')->with('sepet','Sepetteki tüm ürünler silindi');
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
