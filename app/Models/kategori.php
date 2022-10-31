<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\kategori_urun;
class kategori extends Model
{
    use HasFactory;
    protected $guarded=[];
    /*public function urunler(){
        return  $this->hasMany(kategori_urun::class, 'kategori_id', 'id');  
      }*/
      public function urunler(){
        return $this->belongsToMany(urun::class, 'kategori_uruns', 'kategori_id', 'urun_id');  
      }
      public function kat(){
        return $this->hasMany(kategori::class, 'ust_id', 'id');  
      }
      public function ust_kategori(){
        return $this->hasOne(kategori::class, 'id', 'ust_id');  
      }
}
