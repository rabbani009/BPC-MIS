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
            $table->boolean('remarks');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('venue');
            $table->string('number_of_trainers');
            $table->string('trainers');
            $table->string('number_of_trainees');

            $table->string('source_of_fund');
            $table->string('budget_as_per_contract');
            $table->string('actual_budget_as_per_expenditure');
            $table->string('actual_expenditure_as_per_actual_budget');

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
