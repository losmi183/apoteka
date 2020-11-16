@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">

            <div class="col-3">
                @include('partials.sidebar')
            </div>

            <div class="col-9">
                <div class="row">

                    <div class="col-12 d-flex justify-content-right mb-3">
                        {{-- {{$products->appends(request()->input())->links()}} --}}
                        <div class="sort-price">
                            Sortiraj po Ceni 
                            {{-- Helper method appendQuery - dodaje queryString prethodnoj ruti  --}}
                            <a title="rastuće" href="{{appendQuery('sort', 'low_hi')}}"><i class="fas fa-arrow-circle-up"></i></a>
                            <a title="opadajuće" href="{{appendQuery('sort', 'hi_low')}}"><i class="fas fa-arrow-circle-down"></i></a>
                        </div>
                    </div>

                    @foreach ($products as $product)
                        <div class="col-md-4 box1">
                            <div class="shop-image">
                                <a href="/proizvodi/{{$product->slug}}">
                                    <img class="img-fluid" src="/images/products/{{$product->image}}">
                                </a>
                            </div>
                            <a href="/proizvodi/{{$product->slug}}">
                                <h3>{{$product->ime}}</h3>
                            </a>
                            <p>{{ Str::words($product->opis, 10) }}</p>

                            <hr>

                            <div class="box-bottom d-flex justify-content-between">
                                <p>{{$product->cena}} KM</p>
                                <div class="box-actions">
                                    {{-- <span class="sr-only">Dodaj u korpu</span> --}}
                                    <a data-toggle="tooltip" data-placement="top" title="Dodaj u korpu" href=""><i  class="fa fa-plus-circle"></i></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Dodaj u listu želja" href=""><i class="fa fa-heart"></i></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Uporedi Proizvod" href=""><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                        </div>                        
                    @endforeach

                    
                    <div class="col-12 d-flex justify-content-center mb-3">
                            {{$products->appends(request()->input())->links()}}
                    </div>
                    
                </div>
            </div>


            <div class="col-3"></div>
            <div class="col-3"></div>
            <div class="col-3"></div>
        </div>
    </div>



@endsection