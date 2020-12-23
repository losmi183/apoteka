@extends('layouts.app')

@section('content')  

<section id="shop">
    <div class="container">
        <div class="row">

            <!-- Bradcrumb  -->
            <div class="col-12 my-4">
                <span class="text-primary">Prodavnica</span> / 
                <a  class="text-primary" href="/prodavnica/{{$selected_category->slug}}">{{ $selected_category->name }}</a> 
                @if ($selected_subcategory)
                    / <span class="text-primary">{{ $selected_subcategory->name }}</span> 
                @endif
            </div>

            <!-- Sidebar  -->
            <div class="col-md-3">
                <div class="sidebar mb-4">
                    <div class="sidebar-header">{{ $selected_category->name }}</div>
                    <div class="sidebar-content">     
                        @foreach ($all_subcategories as $item)
                            <a class="sidebar-item {{ $selected_subcategory ? ($selected_subcategory->slug == $item->slug ? 'active' : '') : '' }}" 
                                href="/prodavnica/{{$selected_category->slug}}/{{$item->slug}}"><span>{{$item->name}}</span><span>[3]</span></a>
                        @endforeach                       
                    </div>
                </div>
                {{-- <div class="sidebar">
                    <div class="sidebar-header">sortiraj</div>
                    <div class="sidebar-content">                            
                        <a href="#" class="sidebar-item"><span>Po ceni rastuće</span></a>
                        <a class="sidebar-item"><span>Po ceni opadajuće</span></a>
                        <a class="sidebar-item active"><span>Najnovije</span></a>
                        <a class="sidebar-item"><span>Najstarije</span></a>
                    </div>
                </div> --}}
            </div><!-- Endof Sidebar  -->


            <div class="col-md-9">
                <div class="row">
                    @foreach ($products as $product)
                        
                        <div class="col-sm-6 col-lg-4 mb-4">
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
                                        <span class="product-price"><strong>{{ presentPrice($product->cena) }}</strong>KM</span>
                
                                        <div class="product-order">
                                            <form class="add-to-cart-form" action="/cart" method="POST">
                                                @csrf
                                                <div class="input-group">

                                                    <input name="id" type="hidden" value="{{ $product->id }}">
                                                    <input name="name" type="hidden" value="{{ $product->ime }}">
                                                    <input name="slug" type="hidden" value="{{ $product->slug }}">
                                                    <input name="qty" type="number" class="form-control" value="1">
                                                    <input name="price" type="hidden" value="{{ $product->cena }}">
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

                </div><!-- ROW  -->
            </div><!-- PRODUCTS COL-9 SPACE  -->
            


        </div>
    </div>
</section>

@endsection
