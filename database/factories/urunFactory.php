<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class urunFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $urun=$this->faker->sentence(2);
        return [
            'slug' => $urun, // Laravel faker paketini direk kullanıyor, bir işlem yapmanıza gerek yok
            'urun-adi' =>Str::slug($urun),
            'aciklama' => $this->faker->text,
            'fiyat' => mt_rand( 0, 1100 ) / 10
            
        ];
    }
}
