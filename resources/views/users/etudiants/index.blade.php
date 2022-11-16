@extends('layouts.usersLayouts')
@section('content')

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Total néo-bachelier 2022-2023</h1>
    <div class="row">
        <div class="col-md-4">
            <a href="{{route('registration.etudiants')}}" class="btn btn-sm btn-primary">
                <i class="fas fa-arrow-right"></i> Inscription
            </a>
        </div>
        
        <div class="col-md-4">
            <a href="{{route('export.etudiants.to')}}" class="btn btn-sm btn-success">
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
        <h6 class="m-0 font-weight-bold text-primary">La liste de néobachelier 2022-2023</h6>

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
                        <th>Lieu de naissance</th>
                        <th>Age</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <!-- <th>Adresse</th>
                        <th>Faculté</th>
                        <th>Niveau</th>
                        <th>Semestre</th>
                        <th>Filière</th>
                        <th>Résidence</th> -->
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($etudiants as $etudiant)
                        <tr>
                            <td>{{ $etudiant->matricule }}</td>
                            <td>{{ $etudiant->nom }}</td>
                            <td>{{ $etudiant->prenom }}</td>
                            <td>{{ $etudiant->sexe }}</td>
                            <td>{{ $etudiant->date_de_naissance }}</td>
                            <td>{{ $etudiant->lieu_de_naissance }}</td>
                            <td>{{ $etudiant->age }}</td>
                            <td>{{ $etudiant->telephone }}</td>
                            <td>{{ $etudiant->email }}</td>
                            <!-- <td>{{ $etudiant->adresse }}</td>
                            <td>{{ $etudiant->faculte}}</td>
                            <td>{{ $etudiant->niveau}}</td>
                            <td>{{ $etudiant->semestre}}</td>
                            <td>{{ $etudiant->filiere}}</td>
                            <td>{{ $etudiant->residence}}</td> -->
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
                                <a href="{{url('edit-etudiant-inscrit/'.$etudiant->id)}}"
                                    class="btn btn-success m-2">
                                    <i class="fa fa-check"></i>
                                </a>
                              
                                <a class="btn btn-primary m-2" href="#" data-toggle="modal" data-target="#deleteModal">
                                    <i class="fas fa-info"></i>
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