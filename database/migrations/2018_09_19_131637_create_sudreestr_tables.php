<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSudreestrTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('cause_categories')) {
            Schema::create('cause_categories', function(Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->bigIncrements('id');
                $table->integer('category_code')->unsigned();
                $table->text('name');
            });
        }

        if (!Schema::hasTable('courts')) {
            Schema::create('courts', function(Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->bigIncrements('id');
                $table->integer('court_code')->unsigned();
                $table->text('name');
                $table->integer('instance_code')->unsigned();
                $table->integer('region_code')->unsigned();
            });
        }

        if (!Schema::hasTable('instances')) {
            Schema::create('instances', function(Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->bigIncrements('id');
                $table->integer('instance_code')->unsigned();
                $table->text('name');
            });
        }

        if (!Schema::hasTable('judgment_forms')) {
            Schema::create('judgment_forms', function(Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->bigIncrements('id');
                $table->integer('judgment_code')->unsigned();
                $table->text('name');
            });
        }

        if (!Schema::hasTable('justice_kinds')) {
            Schema::create('justice_kinds', function(Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->bigIncrements('id');
                $table->integer('justice_kind')->unsigned();
                $table->text('name');
            });
        }

        if (!Schema::hasTable('regions')) {
            Schema::create('regions', function(Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->bigIncrements('id');
                $table->integer('region_code')->unsigned();
                $table->text('name');
            });
        }

        if (!Schema::hasTable('judges')) {
            Schema::create('judges', function(Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->bigIncrements('id');
                $table->integer('court_code')->unsigned();
                $table->text('name');
            });
        }

        if (!Schema::hasTable('documents')) {
            Schema::create('documents', function(Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->bigIncrements('id');
                $table->integer('doc_id')->unsigned();
                $table->integer('court_code')->unsigned();
                $table->integer('judgment_code')->unsigned();
                $table->integer('justice_kind')->unsigned();
                $table->string('category_code');
                $table->string('cause_num')->nullable();
                $table->date('adjudication_date');
                $table->date('receipt_date');
                $table->integer('judge_id')->nullable();
                $table->text('doc_url')->nullable();
                $table->integer('status');
                $table->date('date_publ');
                $table->tinyInteger('file_created')->default(0);
                $table->integer('file_create_attempts')->default(0)->unsigned();
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
        Schema::dropIfExists('cause_categories');
        Schema::dropIfExists('courts');
        Schema::dropIfExists('instances');
        Schema::dropIfExists('judgment_forms');
        Schema::dropIfExists('justice_kinds');
        Schema::dropIfExists('regions');
        Schema::dropIfExists('judges');
        Schema::dropIfExists('documents');
    }
}
