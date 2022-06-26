<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShortnarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shortnars', function (Blueprint $table) {
            $table->id();
            $table->string('long_url');
            $table->string('short_url');
            $table->string('keyword')->unique();
            $table->integer('hit')->default(0);
            $table->string('user_id')->nullable();
            $table->string('session_id')->nullable();
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
        Schema::dropIfExists('shortnars');
    }
}
