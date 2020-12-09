<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyIndustryCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_industry_category', function (Blueprint $table) {
            $table->id();

            $table->foreignId("company_id")
                ->constrained()
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->foreignId("industry_category_id")
                ->constrained()
                ->onDelete("cascade")
                ->onUpdate("cascade");

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
        Schema::dropIfExists('company_industry_category');
    }
}
