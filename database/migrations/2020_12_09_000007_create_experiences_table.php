<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('company');
            $table->longText('description');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('industry_category_id');
            $table->unsignedBigInteger('career_level_id');

            $table->timestamps();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('industry_category_id')->references('id')
                ->on('industry_categories')->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('career_level_id')->references('id')
                ->on('career_levels')->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
}
