<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KullaniciDetay extends Model
{
    use HasFactory;
    protected $guarded=[];

    
      public function kullanici(){
        return  $this->belongsTo(User::class, 'id', 'kullanici_id');
      }
}
