@extends('layouts.app')

@section('content')

<div id="cart" class="container">
    <div class="row">
        <div class="col-12">    
            <div class="my-4"></div>
            <h3 class="title-primary">Korpa</h3>
            <div class="mb-4"></div>

            <table class="cart-table">
                <thead>
                <tr>
                    <th class="cart-table-column"></th>
                    <th class="cart-table-column">Proizvod</th>
                    <th class="cart-table-column">Cena</th>
                    <th class="cart-table-column">Količina</th>
                    <th class="cart-table-column">Ukupno</th>
                    <th class="cart-table-column"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach (Cart::content() as $item)
                    <tr>
                        <td class="cart-table-column cart-table-image">                            
                            <a href="/proizvodi/{{ $item->options->slug }}">
                                <img src="{{ asset('storage/'.$item->options->image) }}">
                            </a>
                        </td>
                        <td class="cart-table-column text-primary"> 
                            <a href="/proizvodi/{{ $item->options->slug }}">
                                <span>{{ $item->name }}</span>
                            </a>                            
                        </td>
                        <td class="cart-table-column">
                            <div class="row">
                                <div class="col-4 mobile-preview">
                                    <span class="text-left">Cena po komadu</span>
                                </div>                         
                                <div class="col-8">
                                    <p class="text-left">{{ presentPrice($item->price) }}</p>
                                </div>
                            </div>                            
                        </td>

                        <td class="cart-table-column cart-table-input">       
                            
                            <div class="row">
                                <div class="col-4  mobile-preview">
                                    <span class="text-right">Količina</span>
                                </div>
                                <div class="col-8">                                  
                                    <div class="input-group mb-3 custom-input-group">
                                        <div class="input-group-prepend">
                                            <a href="/cart/decrementQty/{{$item->rowId}}" class="btn btn-input type="button">-</a>
                                        </div>
                                        <input type="text" class="form-control input-quantity" min="1" max="100" value="{{ $item->qty }}">
                                        <div class="input-group-append">
                                            <a href="/cart/incrementQty/{{$item->rowId}}" class="btn btn-input" type="button">+</a>
                                        </div>
                                    </div>                              
                                </div>
                            </div>  
                        </td>

                        <td class="cart-table-column">
                            <div class="row">
                                <div class="col-4 mobile-preview">
                                    <span class="text-right">Ukupno</span>
                                </div>
                                <div class="col-8">
                                    <p class="text-left">{{ presentPrice($item->price) * $item->qty }}</p>
                                </div>
                            </div>                               
                        </td>  
                        <td class="cart-table-column cart-table-remove">
                            <a href="/cart/remove/{{$item->rowId}}" class="btn btn-outline-primary">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>   

            <div class="row mt-4 justify-content-end">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="sum-wrapper">
                        <h3 class="title-primary mb-4">Ukupno u korpi</h3>
                        <div class="d-flex justify-content-between">
                            <p>Suma</p>
                            <p>{{presentPrice(Cart::subtotal())}}</p>
                        </div>
                        <a href="/checkout" class="btn btn-primary btn-block mt-4">Plaćanje</a>
                    </div>
                </div>
            </div>
        </div>        {{-- End Col 12  --}}
    </div>
</div>

<div class="my-4"></div>

    <!--RECOMANDED PRODUCTS / Slicky slider / Izdvajamo iz ponude  -->
    <section id="recomanded">
        <div class="container">
            <div class="d-sm-flex justify-content-sm-between align-items-bottom">
                <h3 class="title-primary">izdvajamo iz ponude</h3>
            </div>
            <hr class="mb-4">

            <a class="prev1"><i class="fas fa-angle-left"></i></a>
            <a class="next1"><i class="fas fa-angle-right"></i></a>

            <section class="recomand-slider slider"> 
                
                @foreach ($randomProducts as $product)                    
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
                @endforeach
            </section>
        </div>  <!-- End of slicky slider  -->
    </section>

@endsection

@section('extra-js')
    <script>
        $(document).ready(function(){ 
            $('.input-quantity').each(function(item) {
                if( $(this).val() < 2) {
                    $(this).prev().children().removeAttr('href').css('cursor', 'not-allowed');
                }
                if( $(this).val() > 100) {
                    $(this).next().children().removeAttr('href').css('cursor', 'not-allowed');
                }
            })
        });
    </script>
@endsection