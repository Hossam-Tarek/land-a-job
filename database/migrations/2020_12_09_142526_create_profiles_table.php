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

            $table->foreignId("user_id")
                ->unique()
                ->constrained()
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->foreignId("career_level_id")
                ->nullable()
                ->constrained()
                ->onDelete("set null")
                ->onUpdate("cascade");

            $table->foreignId("country_id")
                ->nullable()
                ->constrained()
                ->onDelete("set null")
                ->onUpdate("cascade");

            $table->foreignId("city_id")
                ->nullable()
                ->constrained()
                ->onDelete("set null")
                ->onUpdate("cascade");

            $table->boolean("gender");
            $table->integer("min_salary")->nullable();
            $table->enum("military_status", ["Exempted", "Completed", "Postponed", "Serving", "Does not apply"]);
            $table->enum("education_level", ["High School", "Bachelor Degree", "Master Degree", "Doctorate Degree"]);
            $table->string("job_title", 128);
            $table->string("cv")->nullable();

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
