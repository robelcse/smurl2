<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClicklogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clicklogs', function (Blueprint $table) {
            $table->id();
            
            $table->integer('shortnar_id');
            $table->string('ip');
            $table->string('country')->nullable();
            $table->string('countryCode')->nullable();
            $table->string('region')->nullable();
            $table->string('regionName')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->string('timezone')->nullable();
            $table->string('isp')->nullable();
            $table->string('orga')->nullable();
            $table->string('agent')->nullable();
            $table->string('referer')->nullable();
            $table->string('language')->nullable();
            $table->string('browser')->nullable();
            $table->string('browser_version')->nullable();
            $table->string('device')->nullable();
            $table->string('device_type')->nullable();
            $table->string('platform')->nullable();
            $table->string('platform_version')->nullable();
            $table->string('day')->nullable();
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
        Schema::dropIfExists('clicklogs');
    }
}
