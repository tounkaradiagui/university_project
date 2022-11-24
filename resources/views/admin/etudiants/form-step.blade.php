@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Inscrire un nouvel étudiant</h1>

        <div class="row">
            <div class="col-md-6">
                <a href="" class="btn btn-sm btn-primary">
                    <i class="fas fa-arrow-left fa-sm"></i> Liste
                </a>
            </div>
        </div>

        {{-- Alert Messages --}}

        @include('common.alert')
    

    </div>
    <div class="section">
        <div class="row">
            <div class="col offset mt-4">
                <div class="card">
                    <div class="card-header text-white bg-primary">
                        <h4>Formulaire d'inscriptions</h4>
                    </div>
                    
                    <form class="contact-form" method="POST" action="">
                        @csrf
                        <div class="card-body">
    
                            <div class="form-section">
    
                                <div class="">
                                    <h3>Informations personnelles de l'étudiant</h3>
                                </div>
    
                                <div class="row">
                                    {{-- Matricule --}}
                                    <div class="col-sm-3 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span>Matricule</label>
                                        <input 
                                        type="text" 
                                        class="form-control form-control-user @error('matricule') is-invalid @enderror" 
                                        id="exampleNom"
                                        placeholder="Numéro matricule CENOU" 
                                        name="matricule" 
                                        value="{{ old('matricule') }}">
                                        
                                        @error('matricule')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
    
                                    {{-- Nom --}}
                                    <div class="col-sm-3 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span>Nom</label>
                                        <input 
                                            type="text" 
                                            class="form-control form-control-user @error('nom') is-invalid @enderror" 
                                            id="exampleNom"
                                            placeholder="Nom" 
                                            name="nom" 
                                            value="{{ old('nom') }}">
    
                                        @error('nom')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
    
                                    {{-- Prénom --}}
                                    <div class="col-sm-3 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span>Prénom</label>
                                        <input 
                                            type="text" 
                                            class="form-control form-control-user @error('prenom') is-invalid @enderror" 
                                            id="examplePrenom"
                                            placeholder="Prénom" 
                                            name="prenom" 
                                            value="{{ old('prenom') }}">
    
                                        @error('prenom')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
    
                                    {{-- Sexe --}}                        
                                    <div class="col-sm-3 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span>Sexe</label>
                                        <select class="form-control form-control-user @error('sexe') is-invalid @enderror" name="sexe">
                                            <option selected disabled>Select sexe</option>
                                            <option value="masculin">Masculin</option>
                                            <option value="feminin">Féminin</option>
                                        </select>
                                        @error('sexe')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
    
                                </div>
    
                                <div class="row">
    
                                    {{-- Date de Naissance --}}
                                    <div class="col-sm-3 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span>Date de Naissance</label>
                                        <input 
                                            type="text" 
                                            class="form-control form-control-user @error('date_de_naissance') is-invalid @enderror" 
                                            id="exampleDate_de_naissance"
                                            name="date_de_naissance" 
                                            value="{{ old('date_de_naissance') }}">
        
                                        @error('date_de_naissance')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
        
                                    {{-- Age --}}
                                    <div class="col-sm-3 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span>Age</label>
                                        <input 
                                            type="text" 
                                            class="form-control form-control-user @error('age') is-invalid @enderror" 
                                            id="examplePrenom"
                                            name="age" 
                                            value="{{ old('age') }}">
        
                                        @error('age')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
        
                                    {{-- Lieu de naissance --}}
                                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span>Lieu de naissance</label>
                                        <input 
                                            type="text" 
                                            class="form-control form-control-user @error('lieu_de_naissance') is-invalid @enderror" 
                                            id="examplelieu_de_naissance"
                                            placeholder="Lieu de naissance" 
                                            name="lieu_de_naissance" 
                                            value="{{ old('lieu_de_naissance') }}">
        
                                        @error('lieu_de_naissance')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
    
                                </div>
    
                                <div class="row">
    
                                    {{-- Email --}}
                                    <div class="col-sm-3 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span>Email</label>
                                        <input 
                                            type="text" 
                                            class="form-control form-control-user @error('email') is-invalid @enderror" 
                                            id="exampleEmail"
                                            placeholder="Email" 
                                            name="email" 
                                            value="{{ old('email') }}">
        
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
        
                                    {{-- Numéro de Téléphone --}}
                                    <div class="col-sm-3 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span>Téléphone</label>
                                        <input 
                                            type="text" 
                                            class="form-control form-control-user @error('telephone') is-invalid @enderror" 
                                            id="exampleMobile"
                                            placeholder="Téléphone" 
                                            name="telephone" 
                                            value="{{ old('telephone') }}">
        
                                        @error('telephone')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
        
                                    {{-- Adresse --}}
                                    <div class="col-sm-3 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span>Adresse</label>
                                        <input 
                                            type="text" 
                                            class="form-control form-control-user @error('adresse') is-invalid @enderror" 
                                            id="exampleMobile"
                                            placeholder="Adresse" 
                                            name="adresse" 
                                            value="{{ old('adresse') }}">
        
                                        @error('adresse')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
    
                                    {{-- Résidence --}}
                                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span>Résidence de l'étudiant</label>
                                        <select class="form-control form-control-user @error('residence') is-invalid @enderror" name="residence">
                                            <option selected disabled>Selectionner residence</option>
                                            <option value="Campus">Campus</option>
                                            <option value="Location">Location</option>
                                            <option value="Chez un parent">Chez un parent</option>
                                        </select>
                                        @error('residence')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
    
                            </div>
    
                            <div class="form-section">
                                <div class="">
                                    <h3>Informations sur l'établissement</h3>
                                </div>
    
                                <div class="row">
                                    {{-- Diplome --}}
                                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span>Diplome D'entré</label>
                                        <select class="form-control form-control-user @error('diplome') is-invalid @enderror" name="diplome">
                                            <option selected disabled>Select diplome</option>
                                            <option value="BAC">BAC</option>
                                            <option value="DUT">DUT</option>
                                            <option value="BT">BT</option>
                                        </select>
                                        @error('diplome')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
    
                                    {{-- Faculté --}}
                                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span>Faculté</label>
                                        <select class="form-control form-control-user @error('faculte') is-invalid @enderror" name="faculte">
                                            <option selected disabled>Selectionner la Faculté</option>
                                            <option value="FAGES">FAGES</option>
                                            <option value="FAMA">FAMA</option>
                                            <option value="FASSO">FASSO</option>
                                            <option value="IUFP">IUFP</option>
                                        </select>
                                        @error('faculte')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
    
                                    {{-- Niveau --}}
                                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span>Niveau</label>
                                        <select class="form-control form-control-user @error('niveau') is-invalid @enderror" name="niveau">
                                            <option selected disabled>Select niveau</option>
                                            <option value="licence">Licence</option>
                                            <option value="master">Master</option>
                                            <option value="doctorat">Doctorat</option>
                                        </select>
                                        @error('niveau')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="row">
                                    {{-- Semestre --}}
                                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span>Semestre</label>
                                        <select class="form-control form-control-user @error('semestre') is-invalid @enderror" name="semestre">
                                            <option selected disabled>Select semestre</option>
                                            <option value="Semestre 1">Semestre 1</option>
                                            <option value="Semestre 2">Semestre 2</option>
                                            <option value="Semestre 3">Semestre 3</option>
                                            <option value="Semestre 4">Semestre 4</option>
                                            <option value="Semestre 5">Semestre 5</option>
                                            <option value="Semestre 6">Semestre 6</option>
                                        </select>
                                        @error('semestre')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
    
                                    {{-- Filière --}}
                                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                                        <span style="color:red;">*</span>Filière</label>
                                        <select class="form-control form-control-user @error('filiere') is-invalid @enderror" name="filiere">
                                            <option selected disabled>Select filiere</option>
                                            <option value="AB">Agro Business</option>
                                            <option value="AE">Agro Economie</option>
                                            <option value="AG">Assistant de Gestion</option>
                                        </select>
                                        @error('filiere')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
    
                            </div>
    
                            <div class="form-section">
                                <div class="">
                                    <h3>Informations sur les parents</h3>
                                </div>
    
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="pere">Nom du père</label>
                                        <input type="text" name="nom_pere" class="form-control">
    
                                        <label for="pere">Prénom du père</label>
                                        <input type="text" name="prenom_pere" class="form-control">
    
                                        <label for="pere">Adresse</label>
                                        <input type="text" name="adresse_pere" class="form-control">
    
                                    </div>
    
                                    <div class="col-md-6">
                                        <label for="pere">Profession</label>
                                        <input type="text" name="profession_pere" class="form-control">
    
                                        <label for="pere">Numéro de Téléphone</label>
                                        <input type="text" name="telephone_pere" class="form-control">
    
                                        <label for="pere">Adresse email <strong>(Facultatif)</strong> </label>
                                        <input type="text" name="email_pere" class="form-control">
                                    </div>
                                </div>
    
                                <hr>
                                <hr>
    
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="pere">Nom de la mère</label>
                                        <input type="text" name="nom_mere" class="form-control">
    
                                        <label for="pere">Prénom </label>
                                        <input type="text" name="prenom_mere" class="form-control">
    
                                        <label for="pere">Adresse</label>
                                        <input type="text" name="adresse_mere" class="form-control">
    
                                    </div>
    
                                    <div class="col-md-6">
                                        <label for="pere">Profession</label>
                                        <input type="text" name="profession_mere" class="form-control">
    
                                        <label for="pere">Numéro de Téléphone</label>
                                        <input type="text" name="telephone_mere" class="form-control">
    
                                        <label for="pere">Adresse email <strong>(Facultatif)</strong> </label>
                                        <input type="text" name="email_mere" class="form-control">
                                    </div>
                                </div>
                                
                            </div>
    
                            <div class="form-navigation">
                                <button type="button" class="previous btn btn-primary  float-left">Précédent</button>
                                <button type="button" class="next btn btn-primary float-right ">Suivant</button>
                                <button type="submit" class="btn btn-success mr-3 float-right">Sauvegarder</button>
                            </div>
    
                        </div>
                        </form>
    
    
                       
                </div>
            </div>
        </div>
    </div>
</div>

@endsection