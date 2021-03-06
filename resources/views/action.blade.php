@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
                <h2 class="title-primary-xl">{{$action->name}}</h2>
                <hr class="mb-4">
            </div>
            @foreach ($products as $product)
                
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3  mb-4">
                <div class="product">
                    <div class="product-image">
                        <a href="/proizvodi/{{$product->slug}}">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="">
                        </a>
                        @if ($product->znacka)
                            <div class="add-on">{{$product->znacka}}</div>
                        @endif
                    </div>
                    <div class="product-text">
                        <a href="/proizvodi/{{$product->slug}}" class="product-title">{{ $product->ime }}</a>
                        <div class="product-info">                                        
                            
                            <div class="product-price">
                                {{-- Ako postoji popust  --}}
                                @if ($product->popust)
                                    <small class="product-price-false mr-1">{{ presentPrice($product->cena) }}</small>
                                    <span class="product-price"><strong>{{ presentPrice($product->popust) }}</strong>KM</span>
                                    
                                @else 
                                    <span class="product-price"><strong>{{ presentPrice($product->cena) }}</strong>KM</span>
                                @endif  
                            </div>
    
                            <div class="product-order">
                                <form class="add-to-cart-form" action="/cart" method="POST">
                                    @csrf
                                    <div class="input-group">

                                        <input name="id" type="hidden" value="{{ $product->id }}">
                                        <input name="name" type="hidden" value="{{ $product->ime }}">
                                        <input name="slug" type="hidden" value="{{ $product->slug }}">
                                        <input name="qty" type="number" class="form-control" value="1">
                                        <input name="price" type="hidden" value="{{ $product->cena }}">
                                        <input name="discount" type="hidden" value="{{ $product->popust }}">
                                        <input name="image" type="hidden" value="{{ $product->image }}">

                                        <div class="input-group-append">
                                            <button title="Dodaj u korpu" class="btn btn-primary add-to-cart-button">
                                                <i class="fas fa-cart-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div> <!-- END OF SINGLE PRODUCT  -->
            @endforeach

        </div> {{-- END OF ROW  --}}
    </div> {{-- END OF CONTAINER  --}}
@endsection