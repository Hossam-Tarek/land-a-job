<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();

            $table->foreignId("job_type_id")
                ->constrained()
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->foreignId("industry_category_id")
                ->constrained()
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->foreignId("career_level_id")
                ->constrained()
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->foreignId("company_id")
                ->constrained()
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->foreignId("country_id")
                ->constrained()
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->foreignId("city_id")
                ->constrained()
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->string("title", 128);
            $table->boolean("status")->default(true);
            $table->tinyInteger("min_years_of_experience");
            $table->tinyInteger("max_years_of_experience")->nullable();
            $table->integer("vacancies");
            $table->integer("min_salary");
            $table->integer("max_salary");
            $table->text("description");
            $table->text("requirements");

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
        Schema::dropIfExists('jobs');
    }
}
