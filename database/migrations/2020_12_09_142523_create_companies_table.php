<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            $table->foreignId("user_id")
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

            $table->foreignId("number_of_employee_id")
                ->nullable()
                ->constrained()
                ->onDelete("set null")
                ->onUpdate("cascade");

            $table->foreignId("industry_category_id")
                ->nullable()
                ->constrained()
                ->onDelete("set null")
                ->onUpdate("cascade");

            $table->string("name", 128)->unique();
            $table->string("url")->nullable()->unique();
            $table->text("about");
            $table->date("founded_date");
            $table->string("logo")->nullable()->unique();
            $table->string("cover_image")->nullable()->unique();
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
        Schema::dropIfExists('companies');
    }
}
