@extends('layouts.master')
@section('content')

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Liste bacheliers</h1>
    <div class="row">
        <div class="col-md-4">
            <a href="{{route('create-etudiants')}}" class="btn btn-sm btn-success">
                <i class="fas fa-arrow-right"></i> Inscription
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{route('import-etudiants')}}" class="btn btn-sm btn-primary">
                <i class="fas fa-arrow-down"></i> Importé depuis excel
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{route('export-etudiants')}}" class="btn btn-sm btn-success">
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
        <h6 class="m-0 font-weight-bold text-primary">
            <!-- <a href="" class="float-start">
            Liste de nouveaux bacheliers 2022 - 2023
            </a> <i class="fas fa-trash"></i>-->
            <a href="" id="deleteAllSelectRecord" class="btn btn-sm btn-danger float-end">
                 Tout supprimé
            </a>
        </h6>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" id="chkCheckAll">
                        </th>
                        <th>Matricule</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Sexe</th>
                        <th>Date de naissance</th>
                        <th>Age</th>
                        <th>Lieu de naissance</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Faculté</th>
                        <th>Niveau</th>
                        <th>Semestre</th>
                        <th>Filière</th>
                        <th>Résidence</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($etudiants as $etudiant)
                        <tr id="sid{{$etudiant->id}}">
                            <td>
                                <input type="checkbox" name="ids" class="checkBoxClass" value="{{$etudiant->id}}">
                            </td>
                            <td>{{ $etudiant->matricule }}</td>
                            <td>{{ $etudiant->nom }}</td>
                            <td>{{ $etudiant->prenom }}</td>
                            <td>{{ $etudiant->sexe }}</td>
                            <td>{{ $etudiant->date_de_naissance }}</td>
                            <td>{{ $etudiant->age }}</td>
                            <td>{{ $etudiant->lieu_de_naissance }}</td>
                            <td>{{ $etudiant->telephone }}</td>
                            <td>{{ $etudiant->email }}</td>
                            <td>{{ $etudiant->adresse }}</td>
                            <td>{{ $etudiant->faculte}}</td>
                            <td>{{ $etudiant->niveau}}</td>
                            <td>{{ $etudiant->semestre}}</td>
                            <td>{{ $etudiant->filiere}}</td>
                            <td>{{ $etudiant->residence}}</td>
                            <td>
                                @if ($etudiant->statut == 'REGULIER')
                                    <span class="badge badge-success">Régulier</span>
                                @elseif ($etudiant->statut == 'LIBRE')
                                    <span class="badge badge-warning">Candidat libre</span>
                                @elseif ($etudiant->statut == 'PROFESSIONNEL')
                                    <span class="badge badge-primary">Professionnel</span>
                                @endif
                            </td>
                            <td style="display: flex">
                                <a href="{{url('edit-etudiant/'.$etudiant->id)}}"
                                    class="btn btn-primary m-2">
                                    <i class="fa fa-pen"></i>
                                </a>

                                <a class="btn btn-danger m-2"  href="{{url('/inscritible/'.$etudiant->id.'/delete')}}" 
                                onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')" 
                                class="btn btn-danger btn-sm" >
                                    <i class="fas fa-trash"></i>
                                </a>

                                <a class="btn btn-success m-2" href="{{route('show.details', $etudiant->id)}}" >
                                    <i class="fas fa-info"></i>
                                </a>

                                <a class="btn btn-danger m-2" href="#" data-toggle="modal" data-target="#deleteModal">
                                    <i class="fas fa-archive"></i>
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