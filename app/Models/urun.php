<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\kategori_urun;
class urun extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
   /* public function kategoriler(){
        return  $this->hasMany(kategori_urun::class, 'urun_id', 'id');  
      }*/
      public function kategoriler(){
       
        return $this->belongsToMany(kategori::class, 'kategori_uruns', 'urun_id', 'kategori_id'); 
      }
      public function detay(){
        return  $this->hasOne(urun_detay::class, 'urun_id', 'id');//user tablosu(model ) içersindeki id alanı post tablosu içerisindeki user ile ilişkilidir
      }
    
      
}
