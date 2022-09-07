<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camp_benefits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('camp_id')->unsigned();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();

            // Foreign Key : 1st Method (camp_id dalam bentuk unsigned)
            $table->foreign('camp_id')->references('id')->on('camps')->onDelete('cascade');

            // Foreign Key : 2nd Method (Syarat: nama kolom harus sesuai dengan nama table relasi)
            // $table->foreignId('camp_id')->constrained()
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camp_benefits');
    }
}
