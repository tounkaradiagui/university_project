@extends('layouts.master')
@section('content')

@include('common.alert')

<!-- #### Modal d'ajout #### -->

<div class="modal fade" id="ajouterModal" tabindex="-1" role="dialog" aria-labelledby="ajouterModalExample"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajouterModalExample">Are you Sure You wanted to Delete?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="{{route('save-faculty')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">

                        {{-- Nom  --}}
                        <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Nom de la faculté</label>
                            <input 
                                type="text" 
                                class="form-control form-control-user @error('nom') is-invalid @enderror" 
                                id="exampleNom"
                                placeholder="Ex: Faculté du Génie et des Sciences" 
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
                                class="form-control form-control-user @error('sigle') is-invalid @enderror" 
                                id="exampleSigle"
                                placeholder="FAGES" 
                                name="sigle" 
                                value="{{ old('sigle') }}">

                            @error('sigle')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                        
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button"  data-dismiss="modal" >Annuler</button>
                    <button class="btn btn-success" type="submit">Ajouté</button>
                
                </div>
            </form>
        </div>
    </div>
</div>

<!-- #### Fin modal d'ajout #### -->


<!-- #### Modal de suppression #### -->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalExample"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalExample">Voulez-vous vraiment supprimé cette facultée ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                    Cliqué sur Oui pour exécuter cette action ?
            </div>

            <div class="modal-footer">

                <button class="btn btn-primary" type="button" data-dismiss="modal">Non</button>
                <a class="btn btn-danger" href="">
                    Oui
                </a>

                <form id="user-delete-form" method="POST" action="">
                    @csrf
                    @method('DELETE')
                </form>
                
            </div>
        </div>
    </div>
</div>

<!-- #### Fin modal de suppression #### -->

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Etudiants</h1>
        <div class="row">
            <div class="col-md-4">
                <a href="" data-toggle="modal" data-target="#ajouterModal" class="btn btn-sm btn-success">
                    <i class="fas fa-plus"></i> Ajouter
                </a>
            </div>
        </div>

    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tous les étudiants</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20%">Nom</th>
                            <th width="15%">Sigle</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($facultes as $faculte)
                        <tr>
                            <td>{{ $faculte->nom }}</td>
                            <td>{{ $faculte->sigle }}</td>
                            <td style="display: flex">
                                <a href=""
                                    class="btn btn-primary m-2">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <a class="btn btn-danger m-2" href="#" data-toggle="modal" data-target="#deleteModal">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
   
@endsection()