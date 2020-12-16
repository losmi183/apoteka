@extends('layouts.app')

@section('content')  

<section id="shop">
    <div class="container">
        <div class="row">

            <!-- Bradcrumb  -->
            <div class="col-12 my-4">
                <span class="text-primary">Prodavnica</span> / Proizvodi za mršavljanje
            </div>

            <section id="product">
                <div class="container">
                    <div class="row">
        
                        <!-- Bradcrumb  -->
                        <div class="col-12 my-4">
                            <span class="text-primary">Prodavnica</span> / Proizvodi za mršavljanje
                        </div>                
                        
                        <div class="col-5">         
                            <div class="main-img" id="zoom-in">
                                <img src="/images/products/1.jpg">                
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
                            <div class="small-images row no-gutters">
                                <div class="col"><img class="img-fluid" src="/images/products/1.jpg"></div>
                                <div class="col"><img class="img-fluid" src="/images/products/2.jpg"></div>
                                <div class="col"><img class="img-fluid" src="/images/products/3.jpg"></div>
                                <div class="col"><img class="img-fluid" src="/images/products/4.jpg"></div>
                                <div class="col"><img class="img-fluid" src="/images/products/5.jpg"></div>
                                <div class="col"><img class="img-fluid" src="/images/products/6.jpg"></div>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="product-info">                
                                <h2 class="primary-color mb-3">Proizvod za Bebe 11</h2>
            
                                <div class="row">
                                    <div class="col-md-2">Proizvođač</div>
                                    <div class="col-md-10 brand">Random Company11</div>
                                    <hr class="d-lg-none">
                                    <div class="col-md-2">Šifra</div>
                                    <div class="col-md-10">11</div>
                                    <hr class="d-lg-none">
                                    <div class="col-md-2">Pakovanje</div>
                                    <div class="col-md-10">250 ml</div>
                                    <hr class="d-lg-none">
                                    <div class="col-md-2">Dostupnost</div>
                                    <div class="col-md-10">Na stanju</div>
                                    <hr class="d-lg-none">
                                </div>
            
                                <hr>
            
                                <div class="price">
                                    <p class="mb-2">Cijena sa PDV-om</p>
                                    <h2 class="secondary-color">5.26 KM</h2>
                                </div>
            
                                <hr>
            
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Pakovanje</label>
                                        <select name="">
                                            <option value="">250 ml</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Količina</label>
                                        <input id="kolicina" class="quantity" type="number" value="1" min="1">
                                    </div>
                                </div>
            
                                <br>
                                <hr>
                                <br>
            
                                <div class="cart-buttons">
                                    <form class="d-inline" action="/cart" method="POST">
                                        <input type="hidden" name="_token" value="Pg5bW1tuijqazQ5fbnTrj7oh4NqyNypLSBZTGfEK">                            <input type="hidden" value="11" name="id">
                                        <input type="hidden" value="Proizvod za Bebe 11" name="name">
                                        <input id="qty" type="hidden" value="1" name="qty">
                                        <input type="hidden" value="526" name="price">
                                        <input type="hidden" value="11.jpg " name="image">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            Dodaj u korpu
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                    <button class="btn btn-secondary">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        U listu želja
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </button>
                                </div>
            
                                <div class="line"></div>
                                
                                <h2 class="my-3">Opis proizvoda</h2>
                                <div class="description my-3">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda delectus voluptas iste asperiores neque exercitationem cumque dicta aliquam, eaque quibusdam vel ex porro dolore alias. Error tempora fugiat consectetur aut!
                                </div>
            
                            </div>
        
                        </div>
        
                    </div>
                </div>
            </section>

        </div>
    </div>
</section>

@endsection
