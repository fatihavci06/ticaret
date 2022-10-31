<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class SepetUrun extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    public function sepeturun(){
        return  $this->hasOne(urun::class, 'id', 'urun_id');//user tablosu(model ) içersindeki id alanı post tablosu içerisindeki user ile ilişkilidir
      }
}
