<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncomendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encomendas', function (Blueprint $table) {
            $table->id();
            $table->integer('codhistorico');
            $table->integer('codstatus');
            $table->date('dtstatus');
            $table->time('hrstatus');
            $table->string('status');
            $table->string('observacao')->nullable();
            $table->bigInteger('codremessa');
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
        Schema::dropIfExists('encomendas');
    }
}
