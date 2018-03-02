<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->text('message');
            $table->string('listing')->nullable();
            $table->string('listing_address')->nullable();
            $table->string('listing_latitude')->nullable();
            $table->string('listing_longitude')->nullable();
            $table->string('agent')->nullable();
            $table->string('agent_email')->nullable();
            $table->string('agent_phone')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('important')->default(0);
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
        Schema::dropIfExists('leads');
    }
}
