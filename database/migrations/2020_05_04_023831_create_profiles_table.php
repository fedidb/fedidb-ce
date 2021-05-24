<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('domain')->nullable();
            $table->string('username')->nullable();
            $table->string('webfinger')->nullable()->unique()->index();
            $table->string('sharedInbox')->nullable()->index();
            $table->string('key_id')->nullable()->unique()->index();
            $table->string('inbox')->nullable();
            $table->text('public_key')->nullable();
            $table->timestamp('last_fetched_at')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
