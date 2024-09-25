<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('coupon_code');
            $table->enum('discount_type',['flat', 'percentage']);
            $table->integer('discount_amount');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('total_number_of_uses');
            $table->integer('number_of_uses_per_user');
            $table->string('description')->nullable();
            $table->enum('status',['active','inactive']);
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
        Schema::dropIfExists('coupon');
    }
}
