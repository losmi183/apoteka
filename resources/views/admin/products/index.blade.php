@extends('admin.app-layout')

@section('content')


        <div class="card-header">
            <span class='admin-title'>Svi Proizvodi</span>
            <a href="/product/create" class="btn btn-secondary ml-3 ">Dodaj proizvod</a>
        </div>
        <div class="card-body row">

            <div class="col-xl-2 col-lg-3">
                <aside>
                    <div class="card">
                        <div class="card-header">
                            <h6>KATEGORIJE</h6>
                        </div>
                            <div class="card-body">
                                <ul class="sidebar-list">
                                    @if(isset($categories))
                                        @foreach ($categories as $category)   
                                            <a href="/products/{{$category->id}}"><li class="sidebar-item">{{$category->name}}</li></a>
                                        @endforeach
                                    @endif                
                                </ul>                
                            </div>
                    </div>   

                    {{-- Display Subcategories for selected category  --}}
                    @if ($subcategories)
                        <div class="card">
                            <div class="card-header">PODKATEGORIJE</div>
                            <div class="card-body">
                                <ul class="sidebar-list">
                                    @foreach ($subcategories as $subcategory)   
                                        <a href="/products/{{$category_id}}/{{$subcategory->id}}"><li class="sidebar-item">{{$subcategory->name}}</li></a>
                                    @endforeach
                                </ul>                
                            </div>
                        </div>                    
                    @endif                 
                </aside>
            </div>

            <div class="col-xl-10 col-lg-9">    
                <table class="table">
                    <tr>
                        <th> 
                            <div class="sorting">
                                <p>Ime</p>
                                {{-- <a title="rastuce" href="{{appendQuery('ime', 'rastuce')}}"><i class="fas fa-sort-up"></i></a>
                                <a title="opadajuće" href="{{appendQuery('ime', 'opadajuce')}}"><i class="fas fa-sort-down"></i></a> --}}
                            </div>
                        </th>
                        {{-- <th>Slug</th> --}}
                        <th>Kategorija</th>
                        <th>Podkategorija</th>
                        {{-- <th>Proizvodjač</th> --}}
                        {{-- <th>Akcija</th> --}}
                        {{-- <th>Pakovanje</th> --}}
                        <th>Dostupnost</th>
                        {{-- <th>Opis</th> --}}
                        <th>Slika</th>
                        <th>
                            <div class="sorting">
                                <p>Cena</p>
                                <a title="rastuce" href="{{appendQuery('cena', 'rastuce')}}"><i class="fas fa-sort-up"></i></a>
                                <a title="opadajuće" href="{{appendQuery('cena', 'opadajuce')}}"><i class="fas fa-sort-down"></i></a>
                            </div>
                        </th>
                        {{-- <th>Kreirano</th> --}}
                        {{-- <th>Izmenjeno</th> --}}
                        <th></th>
                    </tr>
                    @foreach ($products as $product)
                    <tr>
                        {{-- <td>{{$product->id}}</td> --}}
                        {{-- <td>{{$product->slug}}</td> --}}
                        <td>{{$product->ime}}</td>
                        <td>@if(!empty($product->category)) {{ $product->category->name }} @endif</td>
                        <td>@if(!empty($product->subcategory)) {{ $product->subcategory->name }} @endif</td>
                        {{-- <td>{{$product->proizvodjac}}</td> --}}
                        {{-- <td>{{$product->akcija}}</td> --}}
                        {{-- <td>{{$product->pakovanje}}</td> --}}
                        <td>{{$product->dostupnost}}</td>
                        {{-- <td>{{ Str::words($product->opis, 3) }}</td> --}}
                        <td><img height="60px" src="{{ asset('storage/' . $product->image) }}"></td>
                        <td>{{presentPrice($product->cena)}}</td>
                        {{-- <td>{{formatDate($product->created_at)}}</td> --}}
                        {{-- <td>{{formatDate($product->updated_at)}}</td>   --}}
                        <td>
                            <div class="controls">
                                <a class="btn btn-success" title="otvori u novom tabu" target="_blank" href="/proizvodi/{{$product->slug}}">Prikaži</a>
                                <a class="btn btn-secondary" title="izmeni" href="/product/edit/{{$product->id}}">Izmeni</a>
                                <form class="d-inline" action="/product/delete/{{$product->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" title="obriši">Obriši</button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>            {{-- col-10  --}}
    
            
        </div>        {{-- card-body  --}}
        
        <div class="d-flex justify-content-center mb-3">
            {{$products->appends(request()->input())->links()}}
        </div>

@endsection