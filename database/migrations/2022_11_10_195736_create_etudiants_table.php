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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe')->nullable();
            $table->string('date_de_naissance')->nullable;
            $table->string('age')->nullable();
            $table->string('lieu_de_naissance')->nullable();
            $table->string('adresse')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('telephone')->unique()->nullable();
            $table->string('statut')->nullable();
            $table->string('etat_candidat')->default('non_inscrit');
            $table->string('niveau')->nullable();
            $table->string('semestre')->nullable();
            $table->string('faculte')->nullable();
            $table->string('filiere')->nullable();
            $table->string('diplome')->nullable();
            $table->string('annee')->nullable();
            $table->string('numero_de_place')->nullable();
            $table->string('scolarite')->nullable();
            $table->string('etablissement')->nullable();
            $table->string('resultat')->nullable();
            $table->string('mention')->nullable();
            $table->string('matricule_def')->nullable();
            $table->string('annee_def')->nullable();
            $table->string('serie')->nullable();
            $table->string('academie')->nullable();
            $table->string('residence')->nullable();
            $table->string('nom_pere')->nullable();
            $table->string('profession_pere')->nullable();
            $table->string('residence_pere')->nullable();
            $table->string('telephone_pere')->nullable();
            $table->string('nom_mere')->nullable();
            $table->string('prenom_mere')->nullable();
            $table->string('profession_mere')->nullable();
            $table->string('residence_mere')->nullable();
            $table->string('telephone_mere')->nullable();
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
        Schema::dropIfExists('etudiants');
    }
};
