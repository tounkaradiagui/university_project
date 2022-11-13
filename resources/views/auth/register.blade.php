@extends('auth.layouts.app')

@section('content')
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Enregistrer votre compte !</h1>
                                </div>
                                <form method="post"  action="{{route('register')}}">
                                    @csrf

                                    <div class="form-group">
                                        <input id="nom" type="text" class="form-control form-control-user @error('nom') is-invalid @enderror" 
                                        name="nom" value="{{ old('nom') }}" required autocomplete="nom" 
                                        autofocus placeholder="Veuillez saisir votre nom.">

                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="prenom" type="prenom" class="form-control form-control-user @error('prenom') is-invalid @enderror" 
                                        name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" 
                                        autofocus placeholder="Veuillez saisir votre prenom.">

                                        @error('prenom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" 
                                        name="email" value="{{ old('email') }}" required autocomplete="email" 
                                        autofocus placeholder="Entrez votre adresse email .">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" 
                                        name="password" required autocomplete="current-password" placeholder="Saisir le mot de passe">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="password-confirm" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" 
                                        name="password_confirmation" required autocomplete="new-password" placeholder="Comfirmer le mot de passe">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <button class="btn btn-primary btn-user btn-block">
                                        S'inscrire
                                    </button>

                                    {{-- <hr>
                                    <a href="index.html" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a> --}}
                                </form>

                                <hr>

                                <div class="text-center">
                                    <a class="small" href="{{route('login')}}">Connectez-vous ici !</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

