<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class urunSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $count = 10;
        \App\Models\urun::factory($count)->create();
    }
}
