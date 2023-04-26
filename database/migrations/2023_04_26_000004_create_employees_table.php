<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->string('title')->nullable();
            $table->date('dob')->nullable();
            $table->string('email')->unique();
            $table->string('training_name');
            $table->string('training_type');
            $table->string('training_provid');
            $table->date('training_ini');
            $table->date('training_end');
            $table->string('training_dur');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
