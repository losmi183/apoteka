@extends('layouts.app')

@section('content')
    
    <div id="cart" class="container">
        <div class="row">

            <div class="col-xl-8 col-md-12">
                <h1 class="title">Vaša Korpa</h1>
                <h2>Trenutno imate {{Cart::count()}} proizvod(a) u korpi</h2>
                <div class="line"></div>

                <table class="table">
                    <tr>
                        <th></th>
                        <th>NAZIV PROIZVODA</th>
                        <th>ŠIFRA</th>
                        <th>KOLIČINA</th>
                        <th class="text-right">CIJENA SA PDV-OM</th>
                        <th></th>
                    </tr>

                    @foreach (Cart::content() as $item)
                        <tr>
                            <td><img height="80px" src="images/products/{{$item->options->image}}"></td>
                            <td><strong>{{$item->name}}</strong><br> 
                                Cijena po jedinici: {{presentPrice($item->price)}} <br>
                                {{-- Pakovanje:ml <br> --}}
                                {{-- Veličina pakovanja: 250</td> --}}
                        
                            <td>{{$item->id}}</td>
                            <td>
                                <form id="qtyForm" action="cart/quantity" method="POST">
                                    @csrf
                                    <input name="rowId" type="hidden" value="{{$item->rowId}}">
                                    <input id="qtyInput" name="quantity" class="quantity" type="number" value="{{$item->qty}}">
                                </form>
                            </td>
                            <td class="text-right"><strong >{{presentPrice($item->price * $item->qty)}}</strong></td>
                        <td><a title="izbaci iz korpe" href="/cart/remove/{{$item->rowId}}"><i class="far fa-window-close"></i></a></td>
                        </tr>
                    @endforeach
                        
                    <tr class="sum-row">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>UKUPNO</strong></td>
                        <td class="text-right"><strong>{{presentPrice(Cart::subtotal())}}</strong></td>
                    </tr>
                    
                </table>

                <div class="line"></div>
                
                <h2>Podaci za isporuku</h2>

                <form action="/order" method="POST">
                    @csrf

                    <div class="form-group">
                        <label class="my-2">Ime</label>
                        <input name="ime" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="my-2">Prezime</label>
                        <input name="prezime" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="my-2">Email</label>
                        <input name="email" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="my-2">Telefon</label>
                        <input name="telefon" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="my-2">Adresa za Isporuku</label>
                        <input name="adresa" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="my-2">Grad</label>
                        <input name="grad" type="text" class="form-control">
                    </div>

                    <div class="spacer-sm"></div>                    

                    <div class="text-right">
                        <button class="button-primary btn-lg"><i class="fa fa-shopping-cart mr-3"></i>Poruči</button>
                    </div>
                </form>
            </div>      {{-- End of col 8                  --}}
        </div>      {{-- End of Row  --}}


        <div class="spacer-sm"></div>
        <div class="line"></div>

        {{-- <div class="container">
            <div class="row">
                <div class="spacer-lg"></div>
        
                <div class="row">
                    @include('partials.recomanded')
                </div>
        
                <div class="spacer-lg"></div>
        
                <div class="row">
                    @include('partials.links')
                </div>
            </div>
        </div> --}}

   
    </div>

@endsection