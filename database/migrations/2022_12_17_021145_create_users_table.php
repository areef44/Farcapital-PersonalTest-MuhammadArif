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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->date('birth_date');
            $table->enum('gender', ["l", "p"]);
            $table->text('alamat');
            $table->string('email')->unique();
            $table->string('password');

            //inisialisasi foreign key ke table pendonor
            $table->tinyInteger("role_id")->default(1);
            // $table->foreign("role_id")->references("id")->on("roles");
            $table->string('status')->nullable();
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
        Schema::dropIfExists('officer');
    }
};
