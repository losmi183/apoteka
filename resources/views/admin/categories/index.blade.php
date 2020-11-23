@extends('admin.layout')

@section('content')

<div id="index">   

{{-- <h1>{{dd($categories)}}</h1> --}}
    <div class="card m-3">
        <div class="card-header">
            <span class='admin-title'>Kategorije i podkategorije</span>
        </div>
        <div class="card-body row">      
            <div class="col-6">

                <div class="controls mt-3 mb-3 border p-3">
                    <form action="/category" method="POST">
                        @csrf
                        <label class=" font-weight-bold mb-1">Kreiraj novu kategoriju</label>
                        <hr>
                        <div class="form-group row">
                            <label class="col-2 mt-2">Naziv</label>
                            <div class="col-10">
                                <input name="name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 mt-2">Slug</label>
                            <div class="col-10">
                                <input name="slug" type="text" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block">Dodaj</button>
                    </form>
                </div>

                <ul class="list-group admin-categories">                    
                    
                    @foreach ($categories as $category)
                    <a href="/categoriesAdmin/{{$category->id}}">
                        <li data-id="{{$category->id}}" class="list-group-item category-list-item">{{$category->name}}</li>
                    </a>
                    @endforeach
                </ul>
                

            </div>
            <div class="col-6">
                <div class="controls mt-3 mb-3">
                    @if ($subcategories)
                        <form action="">
                            <div class="form-group">
                                <label>Dodaj Podkategoriju</label>
                                <input type="text" class="form-control">
                            </div>
                            <button class="btn btn-primary btn-block">Dodaj</button>
                        </form>
                        
                        <ul class="list-group admin-categories admin-subcategories">
                            @foreach ($subcategories as $subcategory)
                                <li data-id="{{$subcategory->id}}" class="list-group-item category-list-item">{{$subcategory->name}}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

            </div>
        </div>


    </div>
</div>

@endsection