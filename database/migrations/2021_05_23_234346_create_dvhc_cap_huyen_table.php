<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDvhcCapHuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dvhc_cap_huyen', function (Blueprint $table) {
            $table->id();
            $table->integer('quan_huyen');
            $table->integer('thanh_pho');
            $table->string('ten_quan_huyen');
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
        Schema::dropIfExists('dvhc_cap_huyen');
    }
}
