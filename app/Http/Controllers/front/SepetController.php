<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\urun;
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
        
      $sepetim= Cart::content();
      
        return view('front.sepet',['sepet'=>$sepetim]);
    }
    public function guncelle($id,Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'adet' => 'required|numeric|between:1,5'
               
           ]);
           if ($validator->fails())
         {
        return response()->json(['errors'=>'1-5 arası stok girebilirsiniz']);
        }
      Cart::update($id,$request->adet);
    }
    public function ekle(Request $request)
    {
        //
    $urun=urun::find($request->id);
        
         //Cart::add($urun->id, $urun->urun_adi, 1,$urun->fiyat, 0, ['size' => 'large']);
         Cart::add(['id'=>$urun->id,'name'=>$urun->urun_adi,'qty'=>1,'price'=>$urun->fiyat,'weight'=>50,'options' => ['slug' => $urun->slug]]);
         
         return redirect()->route('front.sepet')->with('sepet','Urun Sepete Eklendi');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kaldir($rowID)
    {
        //
        Cart::remove($rowID);
        return redirect()->route('front.sepet')->with('sepet','Urun Sepetten Kaldırıldı');
    }
    public function bosalt()
    {
        //
        Cart::destroy();
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
