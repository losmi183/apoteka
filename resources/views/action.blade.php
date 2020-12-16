@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
                <h2 class="title-primary-xl">{{$action->name}}</h2>
                <hr class="mb-4">
            </div>
            @foreach ($products as $product)
                
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="product mb-5">
                        <div class="product">
                            <div class="product-image"><img src="/images/products/{{$product->image}}" alt=""></div>
                            <div class="product-text">
                                <a class="product-title">{{$product->ime}}</a>
                                <div class="product-info">
                                    <span class="product-price"><strong>{{presentPrice($product->cena)}}</strong>KM</span>
            
                                    <div class="product-order">
                                        <form method='GET'>
                                            <div class="input-group">
                                                <input name="qty" type="number" class="form-control" value="1">
                                                <div class="input-group-append">
                                                    <button title="Dodaj u korpu" type="submit" class="btn btn-primary add-to-cart-button" type="button"><i class="fas fa-cart-plus"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div> {{-- END OF ROW  --}}
    </div> {{-- END OF CONTAINER  --}}
@endsection