<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDinnerGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dinner_group', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dinner_id');
            $table->unsignedInteger('group_id');
            // 外部キー制約
            $table->foreign('dinner_id')->references('id')->on('dinners')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
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
        Schema::dropIfExists('dinner_group');
    }
}
