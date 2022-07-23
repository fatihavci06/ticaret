<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSepetUrunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sepet_uruns', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('sepet_id');
            $table->unsignedInteger('urun_id');
            $table->integer('adet');
            $table->decimal('tutar',5,2);
            $table->text('durum',30);

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
        Schema::dropIfExists('sepet_uruns');
    }
}
