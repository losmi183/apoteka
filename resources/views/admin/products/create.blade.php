@extends('admin.layout')

@section('content')

<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class='admin-title'>Novi Proizvod</span>
                    <a href="/products" class="btn btn-outline-primary ml-3 btn-lg">Nazad</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="/product/store" enctype="multipart/form-data">
                        @csrf

                        {{-- Ime  --}}
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Naziv proizvoda</label>

                            <div class="col-md-6">
                                <input id="ime" type="text" class="form-control @error('ime') is-invalid @enderror" name="ime" value="{{ old('ime') }}"  autocomplete="ime" autofocus>

                                @error('ime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Slug  --}}
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Slug </label>

                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}"  autocomplete="slug" autofocus>

                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Kategorija  --}}
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Kategorija</label>

                            <div class="col-md-6">
                                <select id="category" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="">--odaberite kategoriju--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- PodKategorija  --}}
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Podategorija</label>

                            <div class="col-md-6">
                                <select id="subcategories" name="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror"></select>
                            </div>
                            
                            @error('subcategory_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        {{-- Proizvodjač  --}}
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Proizvodjač </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('proizvodjac') is-invalid @enderror" name="proizvodjac" value="{{ old('proizvodjac') }}"  autocomplete="proizvodjac" autofocus>

                                @error('proizvodjac')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Akcija  --}}
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Akcija</label>

                            <div class="col-md-6">
                                <select name="akcija" class="form-control">
                                    <option value="1">Nema popusta</option>
                                    <option value="2">Letnja Akcija</option>
                                </select>
                            </div>
                        </div>

                        {{-- Pakovanje  --}}
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Pakovanje</label>

                            <div class="col-md-6">
                                <select name="pakovanje" class="form-control">
                                    <option value="1">250ml</option>
                                    <option value="2">500ml</option>
                                </select>
                            </div>
                        </div>

                        {{-- Dostupnost  --}}
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Dostupnost</label>

                            <div class="col-md-6">
                                <select name="dostupnost" class="form-control @error('dostupnost') is-invalid @enderror">
                                    <option value="1">Dostupno</option>
                                    <option value="0">Nedostupno</option>
                                </select>
                                
                                @error('dostupnost')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>  
                        </div>
                                                
                        {{-- Cena  --}}
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Cena </label>

                            <div class="col-md-6">
                                <input step="any" min="0.00" type="number" class="form-control @error('cena') is-invalid @enderror" name="cena" value="{{ old('cena') }}"  autocomplete="cena" autofocus>

                                @error('cena')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                                                
                        {{-- Opis  --}}
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Opis</label>

                            <div class="col-md-6">
                                <textarea id="editor" name="opis" class="form-control @error('opis') is-invalid @enderror" cols="30" rows="10">{{ old('opis') }}</textarea>

                                @error('opis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>         

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Slika</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}"  autocomplete="image" autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6 offset-4">
                                    <button class="btn btn-primary btn-lg" type="submit">Sačuvaj</button>
                                    <a href="/products" class="btn btn-outline-secondary btn-lg">Poništi</a>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>{{-- End of Card body  --}}
            </div>  {{-- End of Card  --}}
        </div>
    </div>
</div>

@endsection

@section('extra-js')
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection