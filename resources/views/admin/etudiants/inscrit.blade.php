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
        <h6 class="m-0 font-weight-bold text-primary">Tous les étudiants</h6>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
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
                        @foreach($inscrits as $inscrit)
                        <tr>
                            <td>{{ $inscrit->matricule }}</td>
                            <td>{{ $inscrit->nom }}</td>
                            <td>{{ $inscrit->prenom }}</td>
                            <td>{{ $inscrit->sexe }}</td>
                            <td>{{ $inscrit->date_de_naissance }}</td>
                            <td>{{ $inscrit->age }}</td>
                            <td>{{ $inscrit->lieu_de_naissance }}</td>
                            <td>{{ $inscrit->telephone }}</td>
                            <td>{{ $inscrit->email }}</td>
                            <td>{{ $inscrit->adresse }}</td>
                            <td>{{ $inscrit->faculte}}</td>
                            <td>{{ $inscrit->niveau}}</td>
                            <td>{{ $inscrit->semestre}}</td>
                            <td>{{ $inscrit->filiere}}</td>
                            <td>{{ $inscrit->residence}}</td>
                            <td>
                                @if ($inscrit->statut == 'REGULIER')
                                    <span class="badge badge-success">Régulier</span>
                                @elseif ($inscrit->statut == 'LIBRE')
                                    <span class="badge badge-warning">Candidat libre</span>
                                @elseif ($inscrit->statut == 'PROFESSIONNEL')
                                    <span class="badge badge-primary">Professionnel</span>
                                @endif
                            </td>
                            <td style="display: flex">
                                <a href="{{url('edit-etudiant/'.$inscrit->id)}}"
                                    class="btn btn-primary m-2">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <a class="btn btn-danger m-2"  href="{{url('/inscritible/'.$inscrit->id.'/delete')}}" 
                                onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')" 
                                class="btn btn-danger btn-sm" >
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a class="btn btn-success m-2" href="#" data-toggle="modal" data-target="#deleteModal">
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

        </div>
    </div>
</div>

</div>
@endsection