<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sepet extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function siparis(){
        return  $this->hasOne(siparisler::class, 'sepet_id', 'id');
      }
}
