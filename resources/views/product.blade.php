@extends('layouts.app')

@section('content')  

<section id="shop">
    <div class="container">
        <div class="row">

            <!-- Bradcrumb  -->
            <div class="col-12 my-4">
                <span class="text-primary">Prodavnica</span> / 
                <a  class="text-primary" href="/prodavnica/{{ $category->slug }}">{{ $category->name }}</a> 
                @if ($subcategory)                    
                    / <a class="text-primary" href="/prodavnica/{{ $category->slug }}/{{ $subcategory->slug }}">{{ $subcategory->name }}</a> 
                @endif
            </div>

            <section id="product">
                <div class="container">
                    <div class="row">       
                        
                        <div class="col-5">         
                            <div class="main-img" id="zoom-in">
                                <img src="{{ asset('storage/' . $product->image) }}">                
                            </div>   
                            <div class="zoom-modal" id="zoom-modal">
                                <div class="zoom-content">
                                    <div class="controls">
                                        <span title="prethodna" id="prev-image"><i class="fas fa-angle-left"></i></span>
                                        <span title="zatvori" class="zoom-close" id="zoom-close"><i class="fas fa-window-close"></i></span>
                                        <span title="sledeća" id="next-image"><i class="fas fa-angle-right"></i></i></span>
                                    </div>
                                    <img class="img-fluid" src="/images/products/1.jpg">    
                                </div>
                            </div>
                            {{-- <div class="small-images row no-gutters">
                                <div class="col"><img class="img-fluid" src="/images/products/1.jpg"></div>
                                <div class="col"><img class="img-fluid" src="/images/products/2.jpg"></div>
                                <div class="col"><img class="img-fluid" src="/images/products/3.jpg"></div>
                                <div class="col"><img class="img-fluid" src="/images/products/4.jpg"></div>
                                <div class="col"><img class="img-fluid" src="/images/products/5.jpg"></div>
                                <div class="col"><img class="img-fluid" src="/images/products/6.jpg"></div>
                            </div> --}}
                        </div>
                        <div class="col-7">
                            <div class="product-info">                
                                <h2 class="primary-color mb-3">{{ $product->ime }}</h2>
            
                                <div class="row">
                                    <div class="col-md-2">Proizvođač</div>
                                    <div class="col-md-10 brand">{{ $product->proizvodjac }}</div>
                                    <hr class="d-lg-none">
                                    <div class="col-md-2">Šifra</div>
                                    <div class="col-md-10">{{ $product->id }}</div>
                                    <hr class="d-lg-none">
                                    <div class="col-md-2">Pakovanje</div>
                                    <div class="col-md-10">{{ $product->pakovanje }}</div>
                                    <hr class="d-lg-none">
                                    <div class="col-md-2">Dostupnost</div>
                                    <div class="col-md-10">{{ $product->dostupnost }}</div>
                                    <hr class="d-lg-none">
                                </div>
            
                                <hr>
            
                                <div class="price mb-4">
                                    <p class="mb-2">Cijena sa PDV-om</p>
                                    <h2 class="secondary-color">{{ presentPrice($product->cena) }} KM</h2>
                                </div>     
            
                                <div class="cart-buttons">
                                    
                                    <form class="d-inline" action="/cart" method="POST">
                                        @csrf
                                        <span class="mb-2">Količina: </span>
                                        <div class="input-group mb-4 custom-input-group">
                                            <div class="input-group-prepend decrement">
                                                <a href="#" class="btn btn-input type="button">-</a>
                                            </div>
                                            <input type="text" class="form-control input-quantity" min="1" max="100" value="1" name="qty">
                                            <div class="input-group-append increment">
                                                <a href="#" class="btn btn-input" type="button">+</a>
                                            </div>
                                        </div>    

                                        <input name="id" type="hidden" value="{{ $product->id }}">
                                        <input name="name" type="hidden" value="{{ $product->ime }}">
                                        <input name="slug" type="hidden" value="{{ $product->slug }}">
                                        <input name="price" type="hidden" value="{{ $product->cena }}">
                                        <input name="image" type="hidden" value="{{ $product->image }}">

                                        <button class="btn btn-primary">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            Dodaj u korpu
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
            
                                <div class="mb-4"></div>
                                
                                <h2 class="my-3">Opis proizvoda</h2>
                                <div class="description my-3">{{ $product->opis }}</div>
            
                            </div>
        
                        </div>
        
                    </div>
                </div>
            </section>

        </div>
    </div>
</section>

    <!-- PRODUCTS ON ACTIN RANDOM / Slicky slider / Akcije Section  -->
    <section id="productOnAction">
        <div class="container">
            <div class="d-sm-flex justify-content-sm-between align-items-center">
                <h3 class="title-primary">Preporučujemo</h3>
                <div class="slick-controls">
                    <a class="prev2"><i class="fas fa-angle-left"></i></a>
                    <a class="next2"><i class="fas fa-angle-right"></i></a>
                </div>
            </div>
            <hr class="mb-4">
            <section class="action-slider slider">            
                @foreach ($randomProductsAtAction as $product)
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
                            <a href="/proizvodi/{{$product->slug}}" class="product-title">{{$product->ime}}</a>
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
                @endforeach
            </section>
        </div>  <!-- End of slicky slider  -->
    </section>

@endsection

@section('extra-js')
    <script>
        $(document).ready(function(){ 

            // Increment / Decrement input with + / -
            $('.increment').click(function() {
                var value = $('.input-quantity').val();
                if(value < 100) {  
                    value++;
                    $('.input-quantity').val(value);
                }
            });
            $('.decrement').click(function() {
                var value = $('.input-quantity').val();
                if(value > 1) {  
                    value--;
                    $('.input-quantity').val(value);
                }
            });

        });
    </script>
@endsection
