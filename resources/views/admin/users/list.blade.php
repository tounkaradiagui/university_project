@extends('layouts.master')

@section('title')

{{'La liste des utilisateurs'}}

@endsection

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Utilisateurs connectés : 
            @php $user_total = "0"; @endphp
            @foreach($users as $users_total)
                @php
                if($users_total->isUserOnline())
                {
                    $user_total = $user_total + 1;
                }
                @endphp
            @endforeach
            {{$user_total}}
        </h1>

        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Ajouter
                </a>
            </div>
            <div class="col-md-6">
                <a href="{{ route('export') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-check"></i> Exporter
                </a>
            </div>
        </div>

    </div>

    {{-- Alert Messages --}}

    @include('common.alert')


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tous les utilisateurs</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th >Nom</th>
                            <th >Prénom</th>
                            <th >Email</th>
                            <th >Téléphone</th>
                            <th >Date de Naissance</th>
                            <th >Lieu de Naissance</th>
                            <th >Adresse</th>
                            <th >Status</th>
                            <th >Connectivité</th>
                            <th >Rôle</th> 
                            <th >Création</th> 
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->nom}}</td>
                        <td>{{$user->prenom}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->telephone}}</td>
                        <td>{{$user->date_de_naissance}}</td>
                        <td>{{$user->lieu_de_naissance}}</td>
                        <td>{{$user->adresse}}</td>
                        <td>
                            @if ($user->status == 0)
                                <span class="badge badge-danger">Inactif</span>
                            @elseif ($user->status == 1)
                                <span class="badge badge-success">Actif</span>
                            @endif
                        </td>
                        <td>
                            @if($user->isUserOnline())
                                <span class="badge badge-success">En ligne</span>
                            @else
                                <span class="badge badge-danger">Déconnecté</span>
                            @endif
                        </td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->created_at}}</td>

                        <td style="display: flex">

                            <a href="{{route('users.edit', ['user' => $user->id])}}" class="btn btn-primary m-2" title="Modifier cet utilisateur">
                                <i class="fa fa-pen" ></i>
                            </a>

                            @if($user->status == 1)
                            <a href="{{route('users.status.update', ['user_id' => $user->id, 'status_code' => 0 ])}}" class="btn btn-danger m-2" title="Desactiver cet utilisateur">
                                <i class="fa fa-ban" ></i>
                            </a>
                            @else
                            <a href="{{route('users.status.update', ['user_id' => $user->id, 'status_code' => 1 ])}}" class="btn btn-success m-2" title="Activer cet utilisateur">
                                <i class="fa fa-check" ></i>
                            </a>
                            @endif

                            <a class="btn btn-danger m-2" href="#" data-toggle="modal" data-target="#deleteModal">
                                <i class="fas fa-trash"></i>
                            </a>

                            {{--    <form action="{{route('users.destroy', ['user' => $user->id] )}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-2" type="submit" title="Supprimer cet utilisateur">
                                    <i class="fa fa-trash"></i>

                                </button>
                            </form> --}}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@include('admin.users.delete-modal')
@endsection()