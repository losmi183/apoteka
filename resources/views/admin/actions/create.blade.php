@extends('admin.app-layout')

@section('content')

<div class="card-header">
    <span class='admin-title mr-3'>Kreiraj Akciju</span>            
</div>
<div class="card-body">   

    <form method="POST" action="{{route('actions.store')}}" enctype="multipart/form-data">
        @csrf

        {{-- Ime  --}}
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Naziv proizvoda</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- slug  --}}
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Slug</label>

            <div class="col-md-6">
                <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}"  autocomplete="slug" autofocus>

                @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- Popust  --}}
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Popust %</label>

            <div class="col-md-6">
                <input id="discount" type="number" min="0" max="100" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{ old('discount') }}"  autocomplete="discount" autofocus>

                @error('discount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        {{-- Aktivnost  --}}
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Aktivnost</label>

            <div class="col-md-6">                                  
                <select name="active" class="form-control">
                    <option selected value="1">aktuelna</option>
                    <option value="0">istekla</option>
                </select>           
            </div>
        </div>

        {{-- Slika  --}}
        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Slika</label>

            <div class="col-md-6">                                  
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <small class="d-block mt-1 text-dark"><span class="text-danger">*</span>Slike bi trebalo da budu širine 1920px ili veće kako bi zauzele celu širinu ekrana na velikim rezolucijama</small>
                <small class="d-block text-dark"><span class="text-danger">*</span>Podržani formati: jpeg, png, jpg, gif, maksimalna veli;ina fajla: 5 Mb</small>
            </div>
        </div>

        <div class="col-md-6 offset-md-4">
            <button class="btn btn-secondary">Sačuvaj</button>
            <a href="/actions" class="btn btn-outline-secondary">Poništi</a>
        </div>

</div>

@endsection