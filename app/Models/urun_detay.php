<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class urun_detay extends Model
{
    use HasFactory;
    public function urun(){
        return  $this->belongsTo(urun::class, 'urun_id', 'id');//user tablosu(model ) içersindeki id alanı post tablosu içerisindeki user ile ilişkilidir
      }
}
