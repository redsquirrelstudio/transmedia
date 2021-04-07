<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_project', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->bigInteger('user_id');
            $table->longText('description')->nullable();
            $table->bigInteger('banner')->nullable();
            $table->bigInteger('main_image')->nullable();
            $table->bigInteger('image_1')->nullable();
            $table->bigInteger('image_2')->nullable();
            $table->bigInteger('image_3')->nullable();
            $table->string('youtube_url')->nullable();
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
        Schema::dropIfExists('student_project');
    }
}
