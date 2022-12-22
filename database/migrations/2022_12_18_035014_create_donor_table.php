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
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            //persyaratan untuk kesehatan pendonor
            $table->enum('izin', ["1", "0"]);
            $table->enum('weight', ["1", "0"])->nullable();
            $table->enum('temperature', ["1", "0"])->nullable();
            $table->enum('sistole', ["1", "0"])->nullable();
            $table->enum('diastole', ["1", "0"])->nullable();
            $table->enum('denyut', ["1", "0"])->nullable();
            $table->enum('hemoglobin', ["1", "0"])->nullable();
            $table->string('status_fisik')->nullable();
            $table->tinyInteger("user_id")->default(1);
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
        Schema::dropIfExists('donor');
    }
};
