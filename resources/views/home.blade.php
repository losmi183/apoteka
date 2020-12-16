@extends('layouts.app')

@section('content')  

    {{-- SLIDESHOW WITH ACTIONS  --}}
    <div id="slideshow">
        <div class="container-fluid p-0">

            <div id="carouselExampleIndicators" class="carousel slide">
              <ol class="carousel-indicators">
                  @foreach ($actions as $action)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{ $loop->first ? 'active' : '' }}"></li>
                  @endforeach
              </ol>
  
              <div class="carousel-inner skyblue">
  
                @foreach ($actions as $action)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }} skyblue">
                        <a href="/action/{{$action->slug}}">
                            {{-- storage is default folder for storing files / image is path+filename   --}}
                            <img src="{{ asset('storage/' . $action->image) }}">               
                        </a>
                    </div>
                @endforeach


  
              <!-- controls -->
              <div class="controls-wrapper">
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                    <i class="fas fa-chevron-circle-left"></i>
                    <!-- <span class="sr-only">Previous</span> -->
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
                    <i class="fas fa-chevron-circle-right"></i>
                    <!-- <span class="sr-only">Next</span> -->
                  </a>
              </div>
          </div>
        </div>
    </div>   <!-- End of slideshow  -->

    {{-- RANDOM CATEGORIES  --}}
    <section id="categories" class="bg-light-gray py-4">
        <div class="container">
            <div class="row">
                @foreach ($randomCategories as $category)
                    <div class="col-md-4">
                        <div class="box-simple" data-aos="fade-left" data-aos-easing="ease" data-aos-delay="800">
                            <div class="box-simple-image">
                                <img src="images/category/2.jpg" alt="" class="img-fluid">
                            </div>
                            <h3>{{$category->name}}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> <!-- End of categories  -->

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
                @endforeach
            </section>
        </div>  <!-- End of slicky slider  -->
    </section>

    <div class="my-4"></div>

    <!-- Section News / STATIC FOR NOW  -->
    <section id="news">
        <div class="container">
            <div class="row">
                <div class="col-12"><h3 class="title-primary mb-2">Novosti</h3><hr class="mb-4"></div>
                
                <div class="col-md-4">
                    <div class="box-simple2">
                        <div class="box-simple-image">
                            <img src="images/category/1.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="box-simple-text">
                            <h3>Probotanic proizvodi</h3>
                            <p>Od sada možete poručiti Probotanic proizvode kod nas</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-simple2">
                        <div class="box-simple-image">
                            <img src="images/category/2.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="box-simple-text">
                            <h3>Bebi program 20% popusta</h3>
                            <p>Ceo decembar 2020 važiće popust od 20% na ceo bebi program</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-simple2">
                        <div class="box-simple-image">
                            <img src="images/category/3.png" alt="" class="img-fluid">
                        </div>
                        <div class="box-simple-text">
                            <h3>Organski proizvodi</h3>
                            <p>Veliki izbor proizvoda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- End of News  -->

    <div class="my-4"></div>

    <!-- PRODUCTS ON ACTIN RANDOM / Slicky slider / Akcije Section  -->
    <section id="productOnAction">
        <div class="container">
            <div class="d-sm-flex justify-content-sm-between align-items-center">
                <h3 class="title-primary">Akcije</h3>
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
                            <img src="images/products/{{$product->image}}" alt="">
                            <div class="add-on">Akcija</div>
                        </div>
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
                @endforeach
            </section>
        </div>  <!-- End of slicky slider  -->
    </section>

@endsection

