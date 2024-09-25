<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('enable_sale')->default(true);
            $table->boolean('enable_sale_return')->default(true);
            $table->boolean('enable_sale_replace')->default(true);
            $table->boolean('enable_due_receive')->default(true);
            $table->boolean('enable_due_payment')->default(true);
            $table->boolean('enable_installment')->default(true);
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
        Schema::dropIfExists('message_settings');
    }
}
