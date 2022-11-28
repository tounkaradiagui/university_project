@extends('layouts.master')
@section('content')

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Liste des anciens étudiants </h1>
   

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
            <!-- <a href="" id="deleteAllSelectRecord" class="btn btn-sm btn-danger float-end">
                 Tout supprimé
            </a>
        </h6> -->

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
                        @foreach($archives as $archive)
                        <tr>
                            <td>{{ $archive->matricule }}</td>
                            <td>{{ $archive->nom }}</td>
                            <td>{{ $archive->prenom }}</td>
                            <td>{{ $archive->sexe }}</td>
                            <td>{{ $archive->date_de_naissance }}</td>
                            <td>{{ $archive->age }}</td>
                            <td>{{ $archive->lieu_de_naissance }}</td>
                            <td>{{ $archive->telephone }}</td>
                            <td>{{ $archive->email }}</td>
                            <td>{{ $archive->adresse }}</td>
                            <td>{{ $archive->faculte}}</td>
                            <td>{{ $archive->niveau}}</td>
                            <td>{{ $archive->semestre}}</td>
                            <td>{{ $archive->filiere}}</td>
                            <td>{{ $archive->residence}}</td>
                            <td>
                                @if ($archive->statut == 'REGULIER')
                                    <span class="badge badge-success">Régulier</span>
                                @elseif ($archive->statut == 'LIBRE')
                                    <span class="badge badge-warning">Candidat libre</span>
                                @elseif ($archive->statut == 'PROFESSIONNEL')
                                    <span class="badge badge-primary">Professionnel</span>
                                @endif
                            </td>
                            <td >
                                <!-- <form action="{{url('/inscritible/'.$archive->id.'/delete')}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-2" title="Supprimé"

                                    ><i class="fas fa-trash"></i></button>
                                </form> -->
                                <!-- <a title="Supprimé"  href="{{url('/inscritible/'.$archive->id.'/delete')}}" 
                                onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')" 
                                class="btn btn-sm btn-danger" >
                                    <i class="fas fa-trash"></i>
                                </a>                                 -->

                                <a class="btn btn-primary " href="{{route('restore-etudiant', $archive->id)}}" title="Restauré"  data-toggle="modal" data-target="#deleteModal">
                                    <i class="fas fa-check"></i>
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