<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cell_phone')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('primary_phone')->nullable();
            $table->string('company')->nullable();
            $table->string('default_photo')->nullable();
            $table->string('avatar_path')->nullable();
            $table->text('fb_access_token')->nullable();
            $table->string('fb_page_id')->nullable();
            $table->string('youtube_channel_id')->nullable();
            $table->string('twitter_handle')->nullable();
            $table->string('instagram_handle')->nullable();
            $table->boolean('is_realtor')->default(0);
            $table->text('address')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
