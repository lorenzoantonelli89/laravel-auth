<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table  ->foreign('brand_id', 'brandcar')
                    ->references('id')
                    ->on('brands');
        });
        Schema::table('car_pilot', function (Blueprint $table) {
            $table  ->foreign('car_id', 'pilotcar')
                    ->references('id')
                    ->on('cars')
                    ->onDelete('cascade');
            $table  ->foreign('pilot_id', 'carpilot')
                    ->references('id')
                    ->on('pilots')
                    ->onDelete('cascade');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints(); //per evitare di commentare le funzioni down ogni volta

        Schema::table('cars', function (Blueprint $table){
            $table -> dropForeign('brandcar');
        });
        Schema::table('car_pilot', function (Blueprint $table){
            $table -> dropForeign('pilotcar');
            $table -> dropForeign('carpilot');
        });
    }
}
