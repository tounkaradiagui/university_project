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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_de_naissance');
            $table->string('adresse');
            $table->string('email');

            $table->unsignedBigInteger('niveau_id');
            $table->foreign('niveau_id')
                ->references('id')
                ->on('niveaux')
                ->onDelete('cascade');

            $table->unsignedBigInteger('semestre_id');
            $table->foreign('semestre_id')
                ->references('id')
                ->on('semestres')
                ->onDelete('cascade');
                
            $table->unsignedBigInteger('faculte_id');
            $table->foreign('faculte_id')
                ->references('id')
                ->on('facultes')
                ->onDelete('cascade');

            $table->unsignedBigInteger('filiere_id');
            $table->foreign('filiere_id')
                ->references('id')
                ->on('filieres')
                ->onDelete('cascade');

            $table->unsignedBigInteger('diplome_id');
            $table->foreign('diplome_id')
                ->references('id')
                ->on('diplomes')
                ->onDelete('cascade');


            $table->unsignedBigInteger('annee_id');
            $table->foreign('annee_id')
                ->references('id')
                ->on('annee')
                ->onDelete('cascade');


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
        Schema::dropIfExists('students');
    }
};
