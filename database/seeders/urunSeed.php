<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\urun;
use App\Models\urun_detay;
class urunSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        urun::truncate();
        urun_detay::truncate();
        $count = 5;
        \App\Models\urun::factory($count)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
