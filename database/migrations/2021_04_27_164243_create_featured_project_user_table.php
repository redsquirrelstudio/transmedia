<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturedProjectUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('featured_project_user', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('featured_project_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
        Schema::table('featured_project', function (Blueprint $table) {
           $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('featured_project_user');
        Schema::table('featured_project', function (Blueprint $table) {
            $table->bigInteger('user_id')->nullable();
        });
    }
}
