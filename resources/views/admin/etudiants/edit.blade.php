@extends('layouts.master')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Modifier un compte utilisateur</h1>

        <div class="row">
            <div class="col-md-6">
                <a href="{{route('list-etudiants')}}" class="btn btn-sm btn-primary">
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

        <form method="POST" action="{{ url('update/'.$editEtud->id) }}">
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
                                class="form-control form-control-user @error('matricule') is-invalid @enderror" 
                                id="exampleMatricule"
                                placeholder="matricule" 
                                name="matricule" 
                                value="{{ old('matricule') ? old('matricule') : $editEtud->matricule }}">

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
                                value="{{ old('nom') ? old('nom') : $editEtud->nom }}">

                            @error('nom')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Prénom --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Prénom</label>
                            <input 
                                type="text" 
                                class="form-control form-control-user @error('prenom') is-invalid @enderror" 
                                id="examplePrenom"
                                placeholder="Prénom" 
                                name="prenom" 
                                value="{{ old('prenom') ? old('prenom') : $editEtud->prenom }}">

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
                                value="{{ old('date_de_naissance') ? old('date_de_naissance') : $editEtud->date_de_naissance }}">

                            @error('date_de_naissance')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Email</label>
                            <input 
                                type="email" 
                                class="form-control form-control-user @error('email') is-invalid @enderror" 
                                id="exampleEmail"
                                placeholder="Email" 
                                name="email" 
                                value="{{ old('email') ? old('email') : $editEtud->email }}">

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
                                value="{{ old('telephone') ? old('telephone') : $editEtud->telephone }}">

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
                                value="{{ old('adresse') ? old('adresse') : $editEtud->adresse }}">

                            @error('adresse')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Status --}}

                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Status</label>
                            <select class="form-control form-control-user @error('status') is-invalid @enderror" name="status">
                                <option selected disabled>Selectionner le status</option>
                                <option value="regulier">Régulier</option>
                                <option value="non_regulier">Non régulier</option>
                                <option value="candidat_libre">Candidat libre</option>
                                <option value="professionnel">Professionnel</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Faculté</label>
                            <select class="form-control form-control-user @error('faculte_id') is-invalid @enderror" name="faculte_id">
                                <option selected disabled>Selectionner le FAC</option>
                                @foreach($facultes as $faculte)
                                <option value="{{$faculte->id}}">{{$faculte->nom}} {{$faculte->sigle}}</option>
                                @endforeach
                            </select>
                            @error('faculte_id')
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