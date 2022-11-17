@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifier votre adresse email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                        </div>
                    @endif

                    {{ __('Avant de continuer, veuillez vérifier votre e-mail pour un lien de vérification.') }}
                    {{ __("Si vous n'avez pas reçu l'email "") }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Cliquez ici pour demander un autre') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <h6 class="text-white">Application web de gestion des étudiants || Université de Ségou || Développé par : <a class="text-white" href="https://devdiagui.ml">Diagui TOUNKARA</a> </h6>
    </div>
</div>
@endsection
