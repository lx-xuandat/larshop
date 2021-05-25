<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDvhcCapTinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dvhc_cap_tinh', function (Blueprint $table) {
            $table->id();
            $table->integer('thanh_pho');
            $table->string('ten_thanh_pho');
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
        Schema::dropIfExists('dvhc_cap_tinh');
    }
}
