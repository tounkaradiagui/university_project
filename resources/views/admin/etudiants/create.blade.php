@extends('layouts.master')
@section('content')

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Inscrire un nouvel étudiant</h1>

    <div class="row">
        <div class="col-md-6">
            <a href="{{route('list-etudiants')}}" class="btn btn-sm btn-primary">
                <i class="fas fa-arrow-left fa-sm"></i> Liste
            </a>
        </div>
    </div>
    {{-- Alert Messages --}}

    @include('common.alert')
   

</div>
     <!-- DataTales Example -->
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulaire d'inscription</h6>
        </div>

        <form method="POST" action="{{route('save-etudiants')}}">
            @csrf
            <div class="card">
                <div class="card-body">
                
                    <div class="form-group row">

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
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
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

                        {{-- Date de Naissance --}}
                        <div class="col-sm-3 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Date de Naissance</label>
                            <input 
                                type="date" 
                                class="form-control form-control-user @error('date_de_naissance') is-invalid @enderror" 
                                id="examplePrenom"
                                name="date_de_naissance" 
                                value="{{ old('date_de_naissance') }}">

                            @error('prenom')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

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

                        {{-- Statut --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Statut</label>
                            <select class="form-control form-control-user @error('statut') is-invalid @enderror" name="statut">
                                <option selected disabled>Selectionner le Statut</option>
                                <option value="REGULIER">Régulier</option>
                                <option value="LIBRE">Candidat libre</option>
                                <option value="PROFESSIONNEL">Professionnel</option>
                            </select>
                            @error('statut')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Faculté --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
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

                        {{-- Niveau --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
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

                        {{-- Semestre --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
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

                        {{-- Diplome --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
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

                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-user float-right mb-3">Sauvegarder</button>
                    <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('list-etudiants') }}">Annuler</a>
                </div>
            </div>
        </form>
    </div>


</div>


@endsection