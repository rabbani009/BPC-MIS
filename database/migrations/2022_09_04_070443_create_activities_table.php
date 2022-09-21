<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('council');
            $table->unsignedInteger('association');
            $table->unsignedTinyInteger('program');

            $table->string('activity_title');
            $table->boolean('remarks')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('venue')->nullable();
            $table->string('number_of_trainers')->nullable();
            $table->text('trainers')->nullable();
            $table->string('number_of_trainees')->nullable();
            $table->text('trainees')->nullable();

            $table->string('source_of_fund')->nullable();
            $table->string('budget_as_per_contract')->nullable();
            $table->string('actual_budget_as_per_expenditure')->nullable();
            $table->string('actual_expenditure_as_per_actual_budget')->nullable();

            $table->unsignedTinyInteger('status')->comment('0=Inactive,1=Active')->default(1);

            $table->timestamp('created_at')->nullable();
            $table->unsignedInteger('created_by')->nullable();

            $table->timestamp('updated_at')->nullable();
            $table->unsignedInteger('updated_by')->nullable();

            $table->timestamp('deleted_at')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
};
