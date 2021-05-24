<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bin_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bin_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('profile_id')->unsigned()->nullable();
            $table->json('actor')->nullable();
            $table->json('headers')->nullable();
            $table->json('object')->nullable();
            $table->string('method')->nullable();
            $table->string('response_code')->nullable();
            $table->string('activity_verb')->nullable();
            $table->boolean('valid_signature')->nullable()->default(false);
            $table->boolean('valid_object')->nullable()->default(false);
            $table->boolean('valid_actor')->nullable()->default(false);
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
        Schema::dropIfExists('bin_logs');
    }
}
