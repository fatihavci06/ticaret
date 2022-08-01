<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiparisUrunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siparis_uruns', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('kullanici_id');
            $table->unsignedInteger('urun_id');
            $table->integer('adet');
            $table->decimal('tutar',5,2);
            $table->text('durum',30);
            $table->bigInteger('siparis_id')->unsigned();
            $table->foreign('siparis_id')->references('id')->on('siparislers')->onDelete('cascade');
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
        Schema::dropIfExists('siparis_uruns');
    }
}
