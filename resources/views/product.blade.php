@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-4">

                <div class="image-full">
                    <img id="img-lg" src="/images/products/{{$product->image}}" alt="" class="img-fluid">
                </div>
                {{-- <img src="{{asset('/images/products/'.$product->image)}}" alt="" class="img-fluid"> --}}
                
                @if ($images)
                    <div class="all-images my-3">
                        @foreach ($images as $image)
                            <div class="image-small">
                                <img class="img-fluid img-sm" src="/images/products/{{$image->name}}" alt="">
                            </div>
                        @endforeach                        
                    </div>
                @endif

                <h2 class="sub-title-line2">Recenzije</h2>
                <br>
                <button class="button-secondary-outline">Napiši recenziju</button>
            </div>         
            <div class="col-md-8">
                <div class="product-info">
                    <h1 class="title-color">{{$product->name}}</h1>

                    <div class="row basic-info">
                        <div class="col-md-2">Proizvođač</div>
                        <div class="col-md-10 brand">{{$product->proizvodjac}}</div>
                        <hr class="d-lg-none">
                        <div class="col-md-2">Šifra</div>
                        <div class="col-md-10">{{$product->id}}</div>
                        <hr class="d-lg-none">
                        <div class="col-md-2">Pakovanje</div>
                        <div class="col-md-10">{{$product->pakovanje}}</div>
                        <hr class="d-lg-none">
                        <div class="col-md-2">Dostupnost</div>
                        <div class="col-md-10">{{dostupno($product->dostupnost)}}</div>
                        <hr class="d-lg-none">
                    </div>

                    <hr>

                    <div class="price">
                        <p class="mb-2">Cijena sa PDV-om</p>
                        <h1>44,22 KM</h1>
                    </div>

                    <hr>

                    <div class="quantity row">
                        <div class="col-sm-3">
                            <label>Pakovanje</label>
                            <select name="">
                                <option value="">250 ml</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label>Količina</label>
                            <input class="quantity" type="number" value="1">
                        </div>
                    </div>

                    <br>
                    <hr>
                    <br>

                    <div class="cart-buttons">
                        <button class="button-primary">
                            <i class="fa fa-shopping-cart"></i>
                            Dodaj u korpu
                            <i class="fa fa-plus-circle"></i>
                        </button>
                        <button class="button-secondary">
                            <i class="fa fa-shopping-cart"></i>
                            U listu želja
                            <i class="fa fa-plus-circle"></i>
                        </button>
                    </div>
                    

                    <div class="description">
                        <h2 class="sub-title-line">Opis proizvoda</h2>
                        <h2 class="mt-3 mb-4 font-weight-normal">Ulje crnog kumina</h2>

                        <strong>Namjena</strong>
                        <p>Koristi se kao dodatak ishrani.</p>

                        <strong>Sastav</strong>
                        <p>Ulje biljke crni kumin.</p>

                        <strong>Primjena</strong>
                        <ul class="my-list">
                            <li class="my-list-item">jačanje imuniteta</li>
                            <li class="my-list-item">kod alergija</li>
                            <li class="my-list-item">poboljšava cirkulaciju</li>
                        </ul>

                        <strong>Doziranje i način primjene</strong>
                        <ul class="my-list">
                            <li class="my-list-item">1 kafena kašika, 3 puta na dan</li>
                        </ul>    
                    </div>

                    <br>

                    <a href="#">
                        <div class="download d-flex">
                            <i class="fas fa-file-pdf"></i>
                            <span>Detaljno putstvo
                                <p>pdf dokument | 0.47MB</p>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="spacer-lg"></div>

        <div class="row">
            @include('partials.recomanded')
        </div>

        <div class="spacer-lg"></div>

        <div class="row">
            @include('partials.links')
        </div>
   
    </div>

@endsection