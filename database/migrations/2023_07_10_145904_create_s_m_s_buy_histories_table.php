<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSMSBuyHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_m_s_buy_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigIncrements('business_id');
            $table->string('mobile_number');
            $table->integer('sms_count')->default(0);
            $table->date('purches__date');
            $table->string('amount');
            $table->string('status')->nullable(); 
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
        Schema::dropIfExists('s_m_s_buy_histories');
    }
}
