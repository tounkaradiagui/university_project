@extends('layouts.master')
@section('content')

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Nombre d'étudiants inscris</h1>
    <div class="row">
        <div class="col-md-4">
            <a href="{{route('create-etudiants')}}" class="btn btn-sm btn-primary">
                <i class="fas fa-arrow-right"></i> Inscription
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
@include('commonUsers.alert')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste des étudiants inscris à la Faculté d'Agronomie et de Médecine Animale</h6>

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
                        @foreach($fama as $validateData)
                        <tr>
                            <td>{{ $validateData->matricule }}</td>
                            <td>{{ $validateData->nom }}</td>
                            <td>{{ $validateData->prenom }}</td>
                            <td>{{ $validateData->sexe }}</td>
                            <td>{{ $validateData->date_de_naissance }}</td>
                            <td>{{ $validateData->age }}</td>
                            <td>{{ $validateData->lieu_de_naissance }}</td>
                            <td>{{ $validateData->telephone }}</td>
                            <td>{{ $validateData->email }}</td>
                            <td>{{ $validateData->adresse }}</td>
                            <td>{{ $validateData->faculte}}</td>
                            <td>{{ $validateData->niveau}}</td>
                            <td>{{ $validateData->semestre}}</td>
                            <td>{{ $validateData->filiere}}</td>
                            <td>{{ $validateData->residence}}</td>
                            <td>
                                @if ($validateData->statut == 'REGULIER')
                                    <span class="badge badge-success">Régulier</span>
                                @elseif ($validateData->statut == 'LIBRE')
                                    <span class="badge badge-danger">Candidat libre</span>
                                @elseif ($validateData->statut == 'PROFESSIONNEL')
                                    <span class="badge badge-primary">Professionnel</span>
                                @endif
                            </td>
                            <td style="display: flex">
                                <a class="btn btn-primary m-2" href="#" data-toggle="modal" data-target="#deleteModal">
                                    <i class="fas fa-info"></i>
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