@extends('admin.app-layout')

@section('content')


    <div class="card-header">
        <span class='admin-title'>Kategorije</span>
    </div>
        
    <div class="card-body">
        <div class="controls mt-3 mb-3 border p-3 col-md-12 col-lg-8 col-xl-6">
            <form action="/category" method="POST">
                @csrf
                <input type="hidden" name="parent_id" value="0">
                <label class=" font-weight-bold mb-1">Kreiraj novu kategoriju</label>
                <hr>
                <div class="form-group row">
                    <label class="col-md-4 col-lg-2 mt-2">Naziv</label>
                    <div class="col-md-8 col-lg-10">
                        <input class="category-name form-control @error('name') is-invalid @enderror" name="name" type="text" value="{{old('name')}}">
                        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-lg-2 mt-2">Slug</label>
                    <div class="col-md-8 col-lg-10">
                        <input class="category-slug form-control @error('slug') is-invalid @enderror" name="slug" type="text" value="{{old('slug')}}">
                        
                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                
                <div class="form-group row">
                    <div class="col-md-8 col-lg-10 offset-md-4 offset-lg-2">
                        <button class="btn btn-secondary btn-block">Dodaj</button>
                    </div>
                </div>
            </form>
        </div>

                            
        <table class="table">
            <tr>
                <th>#</th>
                <th>Ime</th>
                <th>Slug</th>
                <th></th>
            </tr>
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                <td>
                    <a href="/subcategories/{{$category->id}}" class="btn btn-secondary">Podkategorije</a>
                    <form class="d-inline" action="/category/{{$category->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Brisanjem kategorije Obrisaćete i sve pripadajuće podkategorije!');" class="btn btn-danger">Obriši</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>                 {{-- Card-body        --}}


@endsection