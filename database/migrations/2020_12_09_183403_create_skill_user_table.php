<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('skill_id');
            $table->enum('year_of_experience',['Less than 1 year','1-3 years', '3-5 years', '5-7 years', 'More than 7 years']);
            $table->enum('proficiency',['No Proficiency', 'Elementary Proficiency', 'Limited Working Proficiency', 'Professional Working Proficiency', 'Full Professional Proficiency']);
            $table->timestamps();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('skill_id')->references('id')
                ->on('skills')->onDelete('cascade')
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
        Schema::dropIfExists('skill_user');
    }
}
