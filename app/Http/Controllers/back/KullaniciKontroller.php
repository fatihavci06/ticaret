<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class KullaniciKontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function kullanici_sayi(){ //dışarıdan fonksiyonun çağrılabilmesi için mutlaka public static olmalı
       return User::count();
            
        }
        
    public function index()
    {
        //

        $data=User::orderByDesc('created_at')->paginate(8);
        return view('back.kullanici.liste',['data'=>$data]);

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
        $data=User::where('email','like','%'.$aranan.'%')->orWhere('name','like','%'.$aranan.'%')->paginate(8);
        $request->flash();
        $sayi=User::where('email','like','%'.$aranan.'%')->orWhere('name','like','%'.$aranan.'%')->count();
        return view('back.kullanici.liste',['data'=>$data,'sayi'=>$sayi.' adet sonuç bulundu.']);
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
        $request->validate([
            
            'email' => 'required|email|unique:users',
            'name'=>'required',
            'isAktive'=>'required',
            'password'=>'required',
            'yoneticimi'=>'required',
           ]);

        $user=new User;
        $user->email=$request->email;
        $user->name=$request->name;
        $user->isAktive=$request->isAktive;
        $user->password=bcrypt($request->password);
        $user->yoneticimi=$request->yoneticimi;
        $user->save();
        return redirect()->back()->with('mesaj','Kayıt başarılı');
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
       $data=User::findOrFail($id);
       return view('back.kullanici.edit',['data'=>$data]);
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
        $user=User::findOrFail($id);
         $request->validate([
            
            'email' => 'required|email|unique:users,email,'.$user->id,
            'name'=>'required',
            'isAktive'=>'required',
            'yoneticimi'=>'required',
           ]);
        
        $data=User::findOrFail($id);
        $data->isAktive=$request->isAktive;
        $data->name=$request->name;
        $data->email=$request->email;
        if($request->password){
            $data->password=bcrypt($request->password);
        }
        $data->yoneticimi=$request->yoneticimi;
        $data->save();

       if($data){
        return redirect()->back()->with('mesaj','Güncelleme başarılı');
       }
       else{
            return 'sorun var';
       }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ekle()
    {
        return view('back.kullanici.ekle');
    }
    public function destroy($id)
    {
        //
        
        
       if(optional(Auth::user())->id==$id){
            return redirect()->back()->with(['mesaj'=>'kendinizi silemezsiniz']);
       }
       else{
            $data=User::find($id)->delete();
            if($data){
            return redirect()->back()->with(['mesaj'=>'silindi']);
           }
           else{
                return redirect()->back()->with(['mesaj'=>'olumsuz']);
           }
       }
       
    }
}
