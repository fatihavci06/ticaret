<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\kategoriurunResource;
use App\Models\urun;
use App\Models\kategori_urun;
use Illuminate\Http\Request;
use DB;
use App\Http\Resources\UserCollection;
class ProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $products=urun::all();
       
        
        return $this->apiResponse($products,'başarılı',202);
       

        /*$data=urun::all();
        $data->each(function($item){
            $item->setAppends(['fullname']); 
		});
        $data->makeHidden(['urun_adi','slug']);
        return response()->json($data);
       
        $data=DB::table('siparis_uruns as su')
        ->selectRaw('su.siparis_id, sum(su.adet) as urunadet')
        ->join('siparislers as s','s.id','=','su.siparis_id')
        ->join('uruns as u','u.id','=','su.urun_id')
        ->groupBy('su.siparis_id')
        ->get();
      
        
      
        
        return response()->json($data);*/

    /* $data=Urun::all();
        return response()->json($data);*/
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

     $data= Urun::create($request->all());
     if($data){
        return response()->json(['message'=>'Kayıt başarılı']);
     }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Urun  $urun
     * @return \Illuminate\Http\Response
     */
    public function show(Urun $urun)
    {
        //
        return $urun;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Urun  $urun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Urun $urun)
    {
        //
        $input=$request->all();
        $urun->update($input);
        return response()->json(['mesaj'=>'Başarı']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Urun  $urun
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Urun $urun)
    {
        //
 
      
      return $id;
    }
}
