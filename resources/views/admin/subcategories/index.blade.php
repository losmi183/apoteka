@extends('admin.layout')

@section('content')

<div id="index">   

{{-- <h1>{{dd($categories)}}</h1> --}}
    <div class="card m-3">
        <div class="card-header">
            <span class='admin-title'>Podkategorije koje pripadaju kategoriji: {{$category->name}}</span>
        </div>
        <div class="card-body row">      
            <div class="col-6">

                <div class="controls mt-3 mb-3 border p-3">
                    <form action="/subcategory" method="POST">
                        @csrf
                        <input type="hidden" name="parent_id" value="{{$category->id}}">
                        <label class=" font-weight-bold mb-1">Kreiraj novu podkategoriju</label>
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
                        <button class="btn btn-primary btn-block">Dodaj</button>
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
                            {{-- <a href="/subcategories/{{$category->id}}" class="btn btn-success">Podkategorije</a> --}}
                            <form class="d-inline" action="/subcategory/{{$category->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Da li ste sigurni?');" class="btn btn-danger">Obriši</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                
                


            </div>            
        </div>


    </div>
</div>

@endsection