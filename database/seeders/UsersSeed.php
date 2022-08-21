<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $count = 45;
        \App\Models\User::factory($count)->create();
    }
}
