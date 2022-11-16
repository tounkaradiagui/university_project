@extends('layouts.usersLayouts')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Modifier un compte utilisateur</h1>

        <div class="row">
            <div class="col-md-6">
                <a href="{{route('list.etudiants')}}" class="btn btn-sm btn-primary">
                    <i class="fas fa-arrow-left fa-sm"></i> Liste
                </a>
            </div>
        </div>

    

    </div>

    {{-- Alert Messages --}}

    @include('common.alert')

     <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulaire de modification</h6>
        </div>

        <form method="POST" action="{{ url('update/inscrit/'.$validate->id) }}">
            @csrf
            @method('PUT')
            <div class="card">
            
                <div class="card-body">
                    <div class="form-group row">

                        {{-- Numéro matricule CENOU --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Matricule</label>
                            <input 
                                type="text" 
                                readonly
                                class="form-control form-control-user @error('matricule') is-invalid @enderror" 
                                id="exampleMatricule"
                                placeholder="matricule" 
                                name="matricule" 
                                value="{{ old('matricule') ? old('matricule') : $validate->matricule }}">

                            @error('matricule')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Nom de famille --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Nom</label>
                            <input 
                                type="text" 
                                class="form-control form-control-user @error('nom') is-invalid @enderror" 
                                id="exampleNom"
                                placeholder="Nom" 
                                name="nom" 
                                value="{{ old('nom') ? old('nom') : $validate->nom }}"
                                readonly>

                            @error('nom')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Prénom --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Prénom</label>
                            <input 
                                type="text"
                                readonly 
                                class="form-control form-control-user @error('prenom') is-invalid @enderror" 
                                id="examplePrenom"
                                placeholder="Prénom" 
                                name="prenom" 
                                value="{{ old('prenom') ? old('prenom') : $validate->prenom }}">

                            @error('prenom')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Date de naissance --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Date de naissance</label>
                            <input 
                                type="text" 
                                class="form-control form-control-user @error('date_de_naissance') is-invalid @enderror" 
                                id="exampleDate"
                                name="date_de_naissance" 
                                value="{{ old('date_de_naissance') ? old('date_de_naissance') : $validate->date_de_naissance }}">

                            @error('date_de_naissance')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>


                        {{-- Age --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Age</label>
                            <input 
                                type="text" 
                                class="form-control form-control-user @error('age') is-invalid @enderror" 
                                id="exampleDate"
                                name="age" 
                                value="{{ old('age') ? old('age') : $validate->age }}">

                            @error('age')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Email</label>
                            <input 
                                type="email" 
                                readonly
                                class="form-control form-control-user @error('email') is-invalid @enderror" 
                                id="exampleEmail"
                                placeholder="Email" 
                                name="email" 
                                value="{{ old('email') ? old('email') : $validate->email }}">

                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Numéro de Téléphone --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Téléphone</label>
                            <input 
                                type="text" 
                                class="form-control form-control-user @error('telephone') is-invalid @enderror" 
                                id="exampleMobile"
                                placeholder="Téléphone" 
                                name="telephone" 
                                value="{{ old('telephone') ? old('telephone') : $validate->telephone }}">

                            @error('telephone')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Adresse --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Adresse</label>
                            <input 
                                type="text" 
                                class="form-control form-control-user @error('adresse') is-invalid @enderror" 
                                id="exampleAdresse"
                                placeholder="Adresse" 
                                name="adresse" 
                                value="{{ old('adresse') ? old('adresse') : $validate->adresse }}">

                            @error('adresse')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Statut --}}
                      

                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Statut</label>
                            <input type="text" name="statut" value="{{ $validate->statut}}" readonly class="form-control">
                            
                            @error('statut')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Facultés --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Faculté</label>
                            <select class="form-control form-control-user @error('faculte_id') is-invalid @enderror" name="faculte">
                                <option selected disabled>Selectionner le FAC</option>
                                <option value="FAGES">Faculté du Génie et des Sciences</option>
                                <option value="FASSO">Faculté des Sciences Sociales</option>
                                <option value="FAMA">Faculté d’Agronomie et de Médecine Animale</option>
                                <option value="IUFP">Institut Universitaire de Formation Professionnelle</option>
                            </select>
                            @error('faculte_id')
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

                        {{-- Résidence --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Résidence de l'étudiant</label>
                            <select class="form-control form-control-user @error('residence') is-invalid @enderror" name="residence">
                                <option selected disabled>Select residence</option>
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

                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                    <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('list-etudiants') }}">Cancel</a>
                </div>
            </div>
        </form>
    </div>


</div>

@endsection