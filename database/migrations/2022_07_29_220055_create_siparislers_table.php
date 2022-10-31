<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiparislersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siparislers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sepet_id')->unsigned();
            $table->decimal('siparis_tutari', 10, 4);
            $table->string('durum', 30)->nullable();
            
            $table->string('adsoyad', 50)->nullable();
            $table->string('adres', 200)->nullable();
            $table->string('telefon', 15)->nullable();
            $table->string('ceptelefonu', 15)->nullable();
            $table->string('banka', 20)->nullable();
            $table->integer('taksit_sayisi')->nullable();
    
            
            
           
           // $table->foreign('sepet_id')->references('id')->on('sepets')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siparislers');
    }
}
