<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\urun;
use App\Models\urun_detay;
use App\Models\kategori;
use App\Models\kategori_urun;
use DB;
use Illuminate\Support\Str;
class Urun2Seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker=Faker::create(); 
        
        
        urun::truncate();
        urun_detay::truncate();
        kategori_urun::truncate();
        
        for ($i = 0; $i < 30; $i++) {
            $urun_adi = $faker->streetName;
            $urun = urun::create([
                'urun_adi' => $urun_adi,
                'slug'     => Str::slug($urun_adi),
                'aciklama' => $faker->paragraph(20),
                'fiyat'   => $faker->randomFloat(3, 1, 20)
            ]);
            
            $detay = $urun->detay()->create([
                'goster_slider'=>rand(0,1),
                'goster_gunun_firsati'=>rand(0,1),
                'goster_one_cikan'=>rand(0,1),
                'goster_cok_satan'=>rand(0,1),
                'goster_indirimli'=>rand(0,1)
            ]);
        }
    
        DB::table('kategori_uruns')->truncate();
        $urunler=urun::all();
        foreach($urunler as $urun){
            
            $data= kategori::pluck('id');
               $sayi=$data->count();
              $anahtar=rand(0, $sayi-1);
     
              kategori_urun::insert([
                    'urun_id'=>$urun->id,
                    'kategori_id'=> $data[$anahtar],
                ]);
        }
       

        
        
        
    }
}
