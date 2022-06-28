<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->truncate();
        $id=DB::table('kategoris')->insertGetId([
            'kategori_adi'=>'Elektronik',
            'slug'=>'elektronik',
            ]);
            DB::table('kategoris')->insert([
                'kategori_adi'=>'Bilgisayar',
                'slug'=>'bilgisayar',
                'ust_id'=>$id
                ]);
                DB::table('kategoris')->insert([
                    'kategori_adi'=>'Bilgisayar/Tablet',
                    'slug'=>'bilgisayar-tablet',
                    'ust_id'=>$id
                    ]);
                DB::table('kategoris')->insert([
                        'kategori_adi'=>'Telefon',
                        'slug'=>'telefon',
                        'ust_id'=>$id
                        ]);
               DB::table('kategoris')->insert([
                            'kategori_adi'=>'Kamera',
                            'slug'=>'kamera',
                            'ust_id'=>$id
                            ]);

        $id2=DB::table('kategoris')->insertGetId([
                'kategori_adi'=>'Outdoor',
                'slug'=>'outdoor',
                ]);
                DB::table('kategoris')->insert([
                    'kategori_adi'=>'Kamp Malzemeleri',
                    'slug'=>'kamp-malzemleri',
                    'ust_id'=>$id2
                    ]);
                DB::table('kategoris')->insert([
                        'kategori_adi'=>'Outdoor Giyim',
                        'slug'=>'outdoor-giyim',
                        'ust_id'=>$id2
                        ]);

        DB::table('kategoris')->insert([
            'kategori_adi'=>'Yapı Market',
            'slug'=>'yapimarket',
            ]);

    }
}
