<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class kullanici extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='kullanicis';
    use SoftDeletes;
    protected $fillable = [
        'adsoyad',
        'email',
        'sifre',
        'aktivasyon_anahtari',
        'aktif_mi',
    ];

   
    protected $hidden = [
        'sifre',
        'aktivasyon_anahtari',
    ];

   
}
