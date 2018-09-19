<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesAndAddressesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('addresses')) {
            Schema::create('addresses', function(Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->bigIncrements('id');
                $table->string('street1')->nullable();
                $table->string('street2')->nullable();
                $table->string('city')->nullable();
                $table->string('state', 16)->nullable();
                $table->string('zip')->nullable();
                $table->string('country', 2)->default('PL');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('profiles')) {
            Schema::create('profiles', function(Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->bigIncrements('id');
                $table->string('first_name');
                $table->string('last_name');
                $table->date('date_of_birth')->nullable();
                $table->enum('gender', array('M', 'F'))->default('M');
                $table->bigInteger('address_id')->unsigned();
                $table->foreign('address_id')->references('id')->on('addresses');
                $table->string('email')->nullable();
                $table->string('web')->nullable();
                $table->string('phone', 32)->nullable();
                $table->string('fax', 32)->nullable();
                $table->timestamps();
            });

            Schema::table('users', function ($table) {
                $table->smallInteger('status')->after('id')->unsigned()->default(1);
                $table->bigInteger('profile_id')->after('id')->unsigned()->nullable();
                $table->foreign('profile_id')->references('id')->on('profiles');
            });

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropForeign(['profile_id']);
            $table->dropColumn("profile_id");
            $table->dropColumn("status");
        });

        Schema::table('profiles', function($table) {
            $table->dropForeign(['address_id']);
        });

        Schema::dropIfExists('addresses');
        Schema::dropIfExists('profiles');

    }
}
