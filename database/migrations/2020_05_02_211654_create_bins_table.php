<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bins', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable()->index();
            $table->string('shortcode')->unique()->index();
            $table->string('name')->default('Untitled')->nullable();
            $table->string('description')->nullable();
            $table->string('scope')->default('public')->index();
            $table->text('public_key')->nullable();
            $table->text('private_key')->nullable();
            $table->boolean('validate_signature')->default(false);
            $table->boolean('validate_object')->default(false);
            $table->boolean('validate_actor')->default(false);
            $table->json('meta')->nullable();
            $table->string('ip')->nullable()->index();
            $table->timestamp('delete_after')->nullable();
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
        Schema::dropIfExists('bins');
    }
}
