<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\kategori;
use App\Models\urun;
class kategori_urun extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function urun_bilgisi(){
        return  $this->hasOne(urun::class, 'id', 'urun_id');  
      }
      public function kategori_bilgisi(){
        return  $this->hasOne(kategori::class, 'id', 'kategori_id');  
      }
     /* public function kategori_bilgisi(){
        return  $this->hasOne(kategori::class, 'id', 'kategori_id');  
     }*/
      
    
}
