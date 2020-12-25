@extends('layouts.app')

@section('content') 

    <div class="container">
        <div class="row">            

            <div class="col-12">    
                <div class="my-4"></div>
                <h3 class="title-primary">Moji podaci</h3>
                <div class="mb-4"></div>
                <div class="alert alert-primary">Sačuvajte Vaše podatke kako bi ste lakše poručivali</a></span></div>           
            </div>        {{-- End Col 12  --}}

            <div class="col-12 col-lg-6 col-xl-5">
                <div class="order-data border p-3">                    

                    <div class="d-flex justify-content-between">
                        <p class="font-weight-bold">Ime i prezime</p>
                        <p class="font-weight-bold text-right">{{ $user->name }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="font-weight-bold">Email</p>
                        <p class="font-weight-bold text-right">{{ $user->email }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="font-weight-bold">Adresa</p>
                        <p class="font-weight-bold text-right">{{ $user->address }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="font-weight-bold">Telefon</p>
                        <p class="font-weight-bold text-right">{{ $user->phone }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="font-weight-bold">Grad</p>
                        <p class="font-weight-bold text-right">{{ $user->city }}</p>
                    </div>    
                </div>

                <div class="order-data border p-3 mt-3">
                    <h3 class="title-primary-sm mb-4">Promenite lozinku</h3>

                    @if(session('success'))
                        <div class="alert alert-primary">{{session('success')}}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif


                    <form action="/changePassword" method="POST">
                        @csrf
 
                        <div class="form-group">
                            <label>Stara lozinka<span class="text-danger">*</span></label>
                            <input type="password" class="form-control @error('stara_lozinka') is-invalid @enderror" name="stara_lozinka">
                            
                            @error('stara_lozinka')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nova lozinka<span class="text-danger">*</span></label>
                            <input type="password" class="form-control @error('nova_lozinka') is-invalid @enderror" name="nova_lozinka">
                           
                            @error('nova_lozinka')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Ponovite lozinku<span class="text-danger">*</span></label>
                            <input type="password" class="form-control @error('ponovi_lozinku') is-invalid @enderror" name="ponovi_lozinku">
                      
                            @error('ponovi_lozinku')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button class="btn btn-primary btn-block">Promeni</button>
                    </form>
                </div>
                
            </div>

            <div class="col-12 col-lg-6 col-xl-7">
                <div class="user-data border p-3">
                    <h3 class="title-primary-sm mb-4">Promenite podatke</h3>   
                    
                    <form action="/moj-profil/{{$user->id}}" method="POST">
                        @csrf
                        @method('PATCH')

                        <input type="hidden" name="id" value="{{$user->id}}">

                        {{-- Ime  --}}
                        <div class="form-group">
                            <label class="">Ime i prezime <span class="text-danger">*</span></label>        
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}"  autocomplete="name" autofocus>    
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                  
                        </div>
    
                        {{-- Email  --}}
                        <div class="form-group">
                            <label class="">Email <span class="text-danger">*</span></label>        
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}"  autocomplete="email" autofocus>    
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                  
                        </div>
    
                        {{-- Adresa  --}}
                        <div class="form-group">
                            <label class="">Adresa <span class="text-danger">*</span></label>        
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?? $user->address }}"  autocomplete="address" autofocus>    
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                  
                        </div>
    
                        {{-- Telefon  --}}
                        <div class="form-group">
                            <label class="">Telefon <span class="text-danger">*</span></label>        
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $user->phone }}"  autocomplete="phone" autofocus>    
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                  
                        </div>
    
                        {{-- Grad  --}}
                        <div class="form-group">
                            <label class="">Grad <span class="text-danger">*</span></label>        
                            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') ?? $user->city }}"  autocomplete="city" autofocus>    
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                  
                        </div>    
                        
                        <button class="btn btn-primary btn-block">Sačuvaj</button>

                    </form>

                </div>
            </div>
          
        </div>        {{-- ROW  --}}
    </div>
    
@endsection