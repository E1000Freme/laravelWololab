<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReportResultsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_results', function (Blueprint $table) {
            $table->integer('report_id')->unsigned();
            $table->integer('results_id')->unsigned();

            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('results_id')->references('id')->on('results')->onDelete('cascade')->onUpdate('cascade');

            $table->primary(['report_id', 'results_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('report_results');
    }
}
