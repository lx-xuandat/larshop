<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('phone');
            $table->string('email');
            $table->string('password');

            $table->string('address'); // Địa chỉ chi tiết, thôn/ấp/xóm/ building,..
            $table->string('ward_street'); // Tên phường/xã - Tên đường/phố
            $table->string('district'); //Tên quận/huyện
            $table->string('province'); //Tên tỉnh/thành phố

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
        Schema::dropIfExists('customers');
    }
}
