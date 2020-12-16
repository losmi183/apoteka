@extends('layouts.app')

@section('content')  

<section id="shop">
    <div class="container">
        <div class="row">

            <!-- Bradcrumb  -->
            <div class="col-12 my-4">
                <span class="text-primary">Prodavnica</span> / Proizvodi za mršavljanje
            </div>

            <!-- Sidebar  -->
            <div class="col-md-3">
                <div class="sidebar mb-4">
                    <div class="sidebar-header">Mrsavljenje</div>
                    <div class="sidebar-content">                            
                        <a href="#" class="sidebar-item"><span>Preparati</span><span>[3]</span></a>
                        <a class="sidebar-item"><span>Čajevi</span><span>[3]</span></a>
                        <a class="sidebar-item active"><span>Lekovi</span><span>[3]</span></a>
                        <a class="sidebar-item"><span>Sprave</span><span>[3]</span></a>
                        <a class="sidebar-item"><span>Hrana</span><span>[3]</span></a>
                    </div>
                </div>
                <div class="sidebar">
                    <div class="sidebar-header">sortiraj</div>
                    <div class="sidebar-content">                            
                        <a href="#" class="sidebar-item"><span>Po ceni rastuće</span></a>
                        <a class="sidebar-item"><span>Po ceni opadajuće</span></a>
                        <a class="sidebar-item active"><span>Najnovije</span></a>
                        <a class="sidebar-item"><span>Najstarije</span></a>
                    </div>
                </div>
            </div><!-- Endof Sidebar  -->


            <div class="col-md-9">
                <div class="row">

                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="product">
                            <div class="product-image">
                                <img src="/images/products/1.jpg" alt="">
                                <div class="add-on">Novo</div>
                            </div>
                            <div class="product-text">
                                <a class="product-title">Ulje crnog kumina</a>
                                <div class="product-info">
                                    <span class="product-price"><strong>29.45</strong>KM</span>
            
                                    <div class="product-order">
                                        <form>
                                            <div class="input-group">
                                                <input name="qty" type="number" class="form-control" value="1">
                                                <div class="input-group-append">
                                                    <button title="Dodaj u korpu" type="submit" class="btn btn-secondary add-to-cart-button" type="button"><i class="fas fa-cart-plus"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
            
                                </div>
                            </div>
                        </div>
                    </div> <!-- END OF SINGLE PRODUCT  -->

                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="product">
                            <div class="product-image">
                                <img src="/images/products/1.jpg" alt="">
                                <div class="add-on">Novo</div>
                            </div>
                            <div class="product-text">
                                <a class="product-title">Ulje crnog kumina</a>
                                <div class="product-info">
                                    <span class="product-price"><strong>29.45</strong>KM</span>
            
                                    <div class="product-order">
                                        <form>
                                            <div class="input-group">
                                                <input name="qty" type="number" class="form-control" value="1">
                                                <div class="input-group-append">
                                                    <button title="Dodaj u korpu" type="submit" class="btn btn-secondary add-to-cart-button" type="button"><i class="fas fa-cart-plus"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
            
                                </div>
                            </div>
                        </div>
                    </div> <!-- END OF SINGLE PRODUCT  -->

                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="product">
                            <div class="product-image">
                                <img src="/images/products/1.jpg" alt="">
                                <div class="add-on">Novo</div>
                            </div>
                            <div class="product-text">
                                <a class="product-title">Ulje crnog kumina</a>
                                <div class="product-info">
                                    <span class="product-price"><strong>29.45</strong>KM</span>
            
                                    <div class="product-order">
                                        <form>
                                            <div class="input-group">
                                                <input name="qty" type="number" class="form-control" value="1">
                                                <div class="input-group-append">
                                                    <button title="Dodaj u korpu" type="submit" class="btn btn-secondary add-to-cart-button" type="button"><i class="fas fa-cart-plus"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
            
                                </div>
                            </div>
                        </div>
                    </div> <!-- END OF SINGLE PRODUCT  -->

                </div><!-- ROW  -->
            </div><!-- PRODUCTS COL-9 SPACE  -->
            


        </div>
    </div>
</section>

@endsection
