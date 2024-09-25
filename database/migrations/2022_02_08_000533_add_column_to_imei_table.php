<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToImeiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imeis', function (Blueprint $table) {
            $table->bigInteger('variation_id');
            $table->bigInteger('purchase_line_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imeis', function (Blueprint $table) {
            $table->dropColumn('variation_id');
            $table->dropColumn('purchase_line_id');
        });
    }
}
