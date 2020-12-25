@extends('layouts.app')

@section('content')

<div class="space-50"></div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h3 class="title-primary mb-4">Prijava</h3>
            <div class="alert alert-primary">Nemate nalog? <span class="ml-4 text-primary"><a href="{{route('register')}}">Registrujte se</a></span></div>
        </div>
        <div class="col-8">
            <div class="card">    
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label class="col-form-label">Email</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                           
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Lozinka</label>
                 
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    Zapamti me
                                </label>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Prijavi me
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link p-0" href="{{ route('password.request') }}">
                                        Zaboravili ste lozinku?
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
