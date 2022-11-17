@extends('layouts.master')
@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4 border-bottom">
        <h1 class="h3 mb-0 text-gray-800">Détails du Profil</h1>
    </div>

    {{-- Alert Messages --}}
        @include('common.alert')

        {{-- Page Content --}}
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="{{asset('uploads/profile/' .Auth::user()->image)}}">
                    <span class="font-weight-bold">{{ auth()->user()->nom }}  {{ auth()->user()->prenom }}</span>
                    <span class="text-black-50"><i>Role:
                            {{ auth()->user()->role
                                }}</i></span>
                    <span class="text-black-50">{{ auth()->user()->email }}</span>
                </div>
            </div>
            <div class="col-md-9 border-right">
                <hr>

                {{-- Change Password --}}

                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Changer le mot de passe</h4>
                    </div>

                    <form action="{{route('update-pass.admin')}}" method="POST">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label class="labels">Ancien mot de passe</label>
                                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror"
                                 placeholder="Mot de passe actuel" required>
                                @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="labels">Nouveau</label>
                                <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror"
                                 required placeholder="Nouveau mot de passe">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="labels">Confirmé</label>
                                <input type="password" name="new_confirm_password" class="form-control @error('new_confirm_password') is-invalid @enderror" 
                                required placeholder="Confirmé le nouveau mot de passe">
                                @error('new_confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-5">
                            <button class="btn btn-success profile-button" type="submit">Validé les modifications</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
</div>


@endsection