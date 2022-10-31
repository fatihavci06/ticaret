<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiparisUrun extends Model
{
    protected $guarded=[];
    use HasFactory;
    public function urunbilgisi(){
        return  $this->hasOne(urun::class, 'id', 'urun_id');//user tablosu(model ) içersindeki id alanı post tablosu içerisindeki user ile ilişkilidir
      }
}
