@extends('layouts.master')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Importation des utilisateurs</h1>
        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Retour</a>
    </div>

    {{-- Alert Messages --}}
    
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Importé des utilisateurs</h6>
        </div>
        <form method="POST" action="{{route('upload')}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        
                        <div class="col-md-12 mb-3 mt-3">
                            <p>Veuillez importé uniquement un fichier au format Excel <a href="{{ asset('files/sample-data-sheet.csv') }}" target="_blank">Sample CSV Format</a></p>
                        </div>
                        {{-- File Input --}}
                        <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                            <span style="color:red;">*</span>Cliquez sur la bannière pour importer</label>
                            <input 
                                type="file" 
                                class="form-control form-control-user @error('file') is-invalid @enderror" 
                                id="exampleFile"
                                name="file" 
                                value="{{ old('file') }}">

                            @error('file')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-user float-right mb-3">Enregister</button>
                    <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('users.index') }}">Annuler</a>
                </div>
            </div>
        </form>
    </div>

</div>


@endsection