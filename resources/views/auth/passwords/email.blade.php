@extends('layouts.app')

@section('content')
<div class="space-50"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="title-primary mb-4">Resetovanje lozinke</h3>
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group ">
                            <label class="col-form-label">Vaša email adresa</label>
                
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                  
                        </div>

                        <div class="form-group mb-0">
                            <div class="">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Pošalji link za resetovanje lozinke
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
