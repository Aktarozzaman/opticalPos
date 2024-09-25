<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomLabelsToTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
            $table->string('custom_field_5')->nullable()->after('custom_field_4');
            $table->string('custom_field_6')->nullable()->after('custom_field_5');
            $table->string('custom_field_7')->nullable()->after('custom_field_6');
            $table->string('custom_field_8')->nullable()->after('custom_field_7');
            $table->string('custom_field_9')->nullable()->after('custom_field_8');
            $table->string('custom_field_10')->nullable()->after('custom_field_9');
            $table->string('lens_type')->nullable()->after('custom_field_10');
            $table->string('remarks')->nullable()->after('lens_type');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
        });
    }
}
