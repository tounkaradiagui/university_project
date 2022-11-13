@extends('layouts.vendorLayouts')
@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4 border-bottom">
        <h1 class="h3 mb-0 text-gray-800">Détails du Profil</h1>
    </div>

    {{-- Alert Messages --}}
        @include('commonVendor.alert')

        {{-- Page Content --}}
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="{{asset('uploads/profile/' .Auth::user()->image)}}">
                    <span class="font-weight-bold">{{ auth()->user()->nom }}  {{ auth()->user()->prenom }}</span>
                    <span class="text-black-50"><i>Role:
                            {{ auth()->user()->role
                                }}</i></span>
                    <span class="text-black-50">{{ auth()->user()->email }}</span>
                </div>
            </div>
            <div class="col-md-9 border-right">
                {{-- Profile --}}
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profil</h4>
                    </div>
                    <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label class="labels">Nom</label>
                                <input type="text" class="form-control @error('nom') is-invalid @enderror"
                                    name="nom" placeholder="Nom"
                                    value="{{ old('nom') ? old('nom') : auth()->user()->nom }}">

                                @error('nom')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="labels">Prénom</label>
                                <input type="text" name="prenom"
                                    class="form-control @error('prenom') is-invalid @enderror"
                                    value="{{ old('prenom') ? old('prenom') : auth()->user()->prenom }}"
                                    placeholder="Prénom">

                                @error('prenom')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="labels">Date de Naissance</label>
                                <input type="date" name="date_de_naissance"
                                    class="form-control @error('date_de_naissance') is-invalid @enderror"
                                    value="{{ old('date_de_naissance') ? old('date_de_naissance') : auth()->user()->date_de_naissance }}"
                                    placeholder="Date de naissance">

                                @error('date_de_naissance')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">

                            <div class="col-md-4">
                                <label class="labels">Lieu de Naissance</label>
                                <input type="text" name="lieu_de_naissance"
                                    class="form-control @error('lieu_de_naissance') is-invalid @enderror"
                                    value="{{ old('lieu_de_naissance') ? old('lieu_de_naissance') : auth()->user()->lieu_de_naissance }}"
                                    placeholder="Lieu de naissance">

                                @error('lieu_de_naissance')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="labels">Numéro de téléphone</label>
                                <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                                    value="{{ old('telephone') ? old('telephone') : auth()->user()->telephone }}"
                                    placeholder="Numéro de téléphone">
                                @error('telephone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="labels">Email</label>
                                <input type="text" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') ? old('email') : auth()->user()->email }}"
                                    placeholder="Email">

                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label class="labels">Date de Création</label>
                                <input type="text" class="form-control @error('created_at') is-invalid @enderror"
                                    name="created_at" placeholder="Date de Création"
                                    value="{{ old('created_at') ? old('created_at') : auth()->user()->created_at }}"
                                    readonly>

                                @error('nom')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="labels">Adresse</label>
                                <input type="text" name="adresse"
                                    class="form-control @error('adresse') is-invalid @enderror"
                                    value="{{ old('adresse') ? old('adresse') : auth()->user()->adresse }}"
                                    placeholder="Adresse">

                                @error('adresse')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>                           
                           
                             <div class="col-md-4">
                                <input type="file" name="image" id="" class="form-control">
                                <img src="{{asset('uploads/profile/' .Auth::user()->image)}}" class="w-45" alt="" width="100px" height="100px">
                            </div>

                        </div>
                        
                        <div class="row mt-5">
                            <button class="btn btn-primary profile-button" type="submit">Validé les informations</button>
                        </div>
                    </form>
                </div>

                <hr>

                {{-- Change Password --}}

                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Changer le mot de passe</h4>
                    </div>

                    <form action="" method="POST">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label class="labels">Ancien mot de passe</label>
                                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror"
                                 placeholder="Mot de passe actuel" required>
                                @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="labels">Nouveau</label>
                                <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror"
                                 required placeholder="Nouveau mot de passe">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="labels">Confirmé</label>
                                <input type="password" name="new_confirm_password" class="form-control @error('new_confirm_password') is-invalid @enderror" 
                                required placeholder="Confirmé le nouveau mot de passe">
                                @error('new_confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-5">
                            <button class="btn btn-success profile-button" type="submit">Validé les modifications</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
</div>


@endsection