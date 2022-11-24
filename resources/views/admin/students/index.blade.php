@extends('layouts.master')
@section('content')

<div class="container-fluid">

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="studentForm">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" id="nom">
            </div>

            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" class="form-control" id="prenom">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone">
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
        
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary">Valider</button>
      </div> -->
    </div>
  </div>
</div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="row">
            <div class="col-md-6">
                <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Ajouter
                </a>
            </div>
            <div class="col-md-6">
                <a href="" class="btn btn-sm btn-success">
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
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{$student->nom}}</td>
                        <td>{{$student->prenom}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->phone}}</td>
                        <td>
                            <a href="" class="btn btn-primary m-2" title="Modifier cet utilisateur">
                                <i class="fa fa-pen" ></i>
                            </a>
                        </td>
                        
                        {{-- <td style="display: flex">

                            

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

                        </td> --}}
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    
</div>
@endsection()