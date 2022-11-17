@extends('layouts.master')

@section('title')

{{'Ajouter des utilisateurs'}}

@endsection


@section('content')

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ajout des utilisateurs</h1>

    <div class="row">
        <div class="col-md-6">
            <a href="{{route('users.index')}}" class="btn btn-sm btn-primary">
                <i class="fas fa-arrow-left fa-sm"></i> Liste
            </a>
        </div>
    </div>
    {{-- Alert Messages --}}

    @include('common.alert')
   

</div>

    {{-- Alert Messages --}}

    {{-- @include('inc_admin.alert') --}}

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulaire</h6>
        </div>

        <form method="POST" action="{{route('users.store')}}">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">

                        {{-- Nom de famille --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
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
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
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

                        {{-- Email --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
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
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
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

                        {{-- Role --}}

                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Role</label>
                            <select class="form-control form-control-user @error('role') is-invalid @enderror" name="role">
                                <option selected disabled>Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                                <option value="vendor">Vendor</option>
                            </select>
                            @error('role')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Status --}}
                        
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Status</label>
                            <select class="form-control form-control-user @error('status') is-invalid @enderror" name="status">
                                <option selected disabled>Select Status</option>
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-user float-right mb-3">Sauvegarder</button>
                    <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('users.index') }}">Annuler</a>
                </div>
            </div>
        </form>
    </div>


</div>


@endsection()