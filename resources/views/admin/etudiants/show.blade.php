@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
        <h1 class="h3 mb-0 text-gray-800">Informations personnelles de l'étudiant</h1>
    </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        {{-- Page Content student --}}
        <div class="row border-bottom">
        
            <div class="col-md-3 border-left border-bottom">
                
                <div class="d-flex flex-column align-items-start text-start p-3 py-5">
                    <img class=" mb-1" width="150px" src="{{asset('uploads/profile/' .Auth::user()->image)}}">
                </div>
            </div>
            <div class="col-md-9 border-right border-left">
                {{-- Profile --}}
                <div class="p-3 py-5 ">
                   
                    <div class="row ">
                        <div class="col-md-6 border-right">

                            <h6 > Numéro matricule CENOU :<span class="font-weight-bold"> {{$student->matricule}}</span></h6>
                            <h6 >Numéro de place : <span class="font-weight-bold"> {{$student->numero_de_place}}</span> </h6>
                            <h6 >Nom : <span class="font-weight-bold"> {{$student->nom}}</span> </h6>
                            <h6 >Prénom : <span class="font-weight-bold"> {{$student->prenom}}</span> </h6>
                            <h6 >Sexe : <span class="font-weight-bold"> {{$student->sexe}}</span> </h6>
                            <h6 >Date de naissance: <span class="font-weight-bold"> {{$student->date_de_naissance}}</span> </h6>
                            <h6 >Age : <span class="font-weight-bold"> {{$student->age}}</span> </h6>
                            <h6 >Lieu de naissance : <span class="font-weight-bold"> {{$student->lieu_de_naissance}}</span> </h6>
                            <h6 >Adresse : <span class="font-weight-bold"> {{$student->adresse}}</span> </h6>
                            
                        </div>
                        <div class="col-md-6">
                            <h6 >Résidence : <span class="font-weight-bold"> {{$student->residence}}</span> </h6>
                            <h6 >Numéro de Téléphone : <span class="font-weight-bold"> {{$student->telephone}}</span> </h6>
                            <h6 >Adresse email : <span class="font-weight-bold"> {{$student->email}}</span> </h6>
                            <h6 >Faculté : <span class="font-weight-bold"> {{$student->faculte}}</span> </h6>
                            <h6 >Niveau : <span class="font-weight-bold"> {{$student->niveau}}</span> </h6>
                            <h6 >Semestre : <span class="font-weight-bold"> {{$student->semestre}}</span> </h6>
                            <h6 >Filière : <span class="font-weight-bold"> {{$student->filiere}}</span> </h6>
                            <h6 >Statut : <span class="font-weight-bold"> {{$student->statut}}</span> </h6>
                            <h6 >Date d'inscription : <span class="font-weight-bold"> {{$student->created_at}}</span> </h6>
                        </div>
                    </div>
                    
                    
                </div>
            </div>

        </div>

        <div class="d-sm-flex align-items-center justify-content-between border-bottom">
            <h1 class="h3 mb-0 text-gray-800">Informations sur les parents</h1>
        </div>
        {{-- Page Content parent--}}
        <div class="row border-bottom">
            
            <div class="col-md border-right border-left">
                {{-- Profile --}}
                <div class="p-3 py-5 ">
                   
                    <div class="row ">
                        <div class="col-md-6 border-right">

                            <h6>Nom du père  : <span class="font-weight-bold"> {{$student->nom_pere}}</span></h6>
                            <h6>Prénom du père  : <span class="font-weight-bold"> {{$student->prenom_pere}}</span></h6>
                            <h6>Profession  : <span class="font-weight-bold"> {{$student->profession_pere}}</span></h6>
                            <h6>Lieu de résidence  : <span class="font-weight-bold"> {{$student->residence}}</span></h6>
                            <h6>Numéro de téléphone : <span class="font-weight-bold"> {{$student->telephone_pere}}</span></h6>
                            <h6>Adresse email  : <span class="font-weight-bold"> {{$student->email_pere}}</span></h6>
                            
                        </div>
                        <div class="col-md-6">
                            <h6>Nom de la mère  : <span class="font-weight-bold"> {{$student->nom_mere}}</span></h6>
                            <h6>Prénom de la mère  : <span class="font-weight-bold"> {{$student->prenom_mere}}</span></h6>
                            <h6>Profession  : <span class="font-weight-bold"> {{$student->profession_mere}}</span></h6>
                            <h6>Lieu de résidence  : <span class="font-weight-bold"> {{$student->residence}}</span></h6>
                            <h6>Numéro de téléphone : <span class="font-weight-bold"> {{$student->telephone_mere}}</span></h6>
                            <h6>Adresse email  : <span class="font-weight-bold"> {{$student->email_mere}}</span></h6>
                        </div>
                    </div>
                    
                    
                </div>
            </div>

        </div>
</div>


@endsection