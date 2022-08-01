<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siparisler extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function sepet(){
        return  $this->belongsTo(Sepet::class, 'id', 'sepet_id');
      }
}
