<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siparisler;
use App\Models\SiparisUrun;
use App\Models\Urun;
use App\Models\User;
use Auth;
use DB;
use Illuminate\Support\Facades\Cache;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function oturumac()
    {
        //
        return view('back.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //




 $coksatan=DB::table('siparis_uruns as su')
        ->selectRaw('su.siparis_id,u.urun_adi, sum(su.adet) as urunadet')
        ->join('siparislers as s','s.id','=','su.siparis_id')
        ->join('uruns as u','u.id','=','su.urun_id')
        ->groupBy('su.urun_id')
        ->orderBy('urunadet','desc')
        ->get();


   $ay=DB::table('siparis_uruns as su')
->select(DB::raw('sum(adet) as `data`'), DB::raw("DATE_FORMAT(su.created_at, '%m-%Y') new_date"),  DB::raw('YEAR(su.created_at) year, MONTH(created_at) month'))
->groupby('month')
->get();


foreach ($ay as $row ) {
    $data2['label2'][] = $row->month.'-'.$row->year;
        $data2['data2'][] = (int) $row->data;
}
    

 $data2['chart_ay'] = json_encode($data2);




        foreach($coksatan as $row) {
        $data['label'][] = $row->urun_adi;
        $data['data'][] = (int) $row->urunadet;
      }
$data['chart_data'] = json_encode($data);
     
    $bitiszamani=now()->addMinutes(10);
    $istatistikler=Cache::remember('istatistikler',$bitiszamani,function(){
      return   $istatistikler=[
         'bekleyen'=>$bekleyen=Siparisler::where('durum','Siparişiniz alındı')->count(),
       'tamamlanan'=> $tamamlanan=Siparisler::where('durum','Sipariş Tamamlandı')->count(),
        'urunsayisi'=>$urunsayisi=Urun::count(),
        'kullanici'=>$kullanici=User::count()
         ];
});


        
        return view('back.index', ['istatistikler'=>$istatistikler,'chart_data'=>$data['chart_data'],'data2'=> $data2['chart_ay']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            
            'email'=>'required|email',
            'password'=>'required',
           ]);
        if (Auth::guard('yonetim')->attempt(['email' => $request->email, 'password' => $request->password,'yoneticimi'=>1])) {
    // Authentication was successful...
            return redirect()->route('back.index');
         }
         else{
            return redirect()->route('back.login')->with(['mesaj'=>'yönetici değilsiniz']);
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        //
         Auth::guard('yonetim')->logout();
        return redirect()->route('back.login');
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
