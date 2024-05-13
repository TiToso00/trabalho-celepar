<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProprietarioIdTableVolts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('volts', function (Blueprint $table) {
            $table->foreignId('proprietario_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('volts', function (Blueprint $table) {
            $table->dropConstrainedForeignId('proprietario_id');
        });
    }
}
