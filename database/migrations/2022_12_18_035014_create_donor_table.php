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
            $table->integer('izin');
            $table->decimal('weight')->nullable();
            $table->decimal('temperature')->nullable();
            $table->integer('blood')->nullable();
            $table->integer('sistole')->nullable();
            $table->integer('diastole')->nullable();
            $table->decimal('denyut')->nullable();
            $table->decimal('hemoglobin')->nullable();
            $table->string('status_fisik')->nullable();
            //relasi ke tabel users
            $table->tinyInteger("user_id")->default(1);
            $table->foreign("user_id")->references("id")->on("users");
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
