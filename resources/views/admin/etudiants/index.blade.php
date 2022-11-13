@extends('layouts.master')
@section('content')

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Etudiants</h1>
    <div class="row">
        <div class="col-md-4">
            <a href="{{route('create-etudiants')}}" class="btn btn-sm btn-success">
                <i class="fas fa-arrow-right"></i> Inscription
            </a>
        </div>
        <div class="col-md-4">
            <a href="" class="btn btn-sm btn-primary">
                <i class="fas fa-arrow-down"></i> Importé depuis excel
            </a>
        </div>
        <div class="col-md-4">
            <a href="" class="btn btn-sm btn-success">
                <i class="fas fa-check"></i> Exporté vers Excel
            </a>
        </div>
        
    </div>

</div>

{{-- Alert Messages --}}
@include('common.alert')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tous les étudiants</h6>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="15%">Matricule</th>
                        <th width="20%">Nom</th>
                        <th width="25%">Prénom</th>
                        <th width="15%">Date de naissance</th>
                        <th width="15%">Adresse</th>
                        <th width="10%">Téléphone</th>
                        <th width="15%">Email</th>
                        <th width="15%">Faculté</th>
                        <th width="15%">Status</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($etudiants as $etudiant)
                        <tr>
                            <td>{{ $etudiant->matricule }}</td>
                            <td>{{ $etudiant->nom }}</td>
                            <td>{{ $etudiant->prenom }}</td>
                            <td>{{ $etudiant->date_de_naissance }}</td>
                            <td>{{ $etudiant->adresse }}</td>
                            <td>{{ $etudiant->telephone }}</td>
                            <td>{{ $etudiant->email }}</td>
                            <td>{{ $etudiant->etudiants->sigle }}</td>
                            <td>
                                @if ($etudiant->status == 'regulier')
                                    <span class="badge badge-success">Régulier</span>
                                @elseif ($etudiant->status == 'non_regulier')
                                    <span class="badge badge-warning">Non régulier</span>
                                @elseif ($etudiant->status == 'candidat_libre')
                                    <span class="badge badge-danger">Candidat libre</span>
                                @elseif ($etudiant->status == 'professionnel')
                                    <span class="badge badge-primary">Professionnel</span>
                                @endif
                            </td>
                            <td style="display: flex">
                                <a href="{{url('edit-etudiant/'.$etudiant->id)}}"
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

         {{--   {{ $users->links() }} --}}
        </div>
    </div>
</div>

</div>

@endsection