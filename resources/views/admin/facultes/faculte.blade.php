@extends('layouts.master')

@section('title')

{{'Facultés et Sigles'}}

@endsection


@section('content')

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ajout des utilisateurs</h1>

    
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

        <form method="POST" action="">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">

                        {{-- Nom de famille --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Nom de la faculté</label>
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
                            <span style="color:red;">*</span>Sigle</label>
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
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                    <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('users.index') }}">Cancel</a>
                </div>
            </div>
        </form>
    </div>


</div>


@endsection()