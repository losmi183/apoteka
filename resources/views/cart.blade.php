@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">

            <div class="col-xl-8 col-md-12">
                <h1 class="title">Vaša Korpa</h1>
                <h2>Trenutno imate 2 proizvod(a) u korpi</h2>
                <div class="line"></div>

                <table class="table">
                    <tr>
                        <th></th>
                        <th>NAZIV PROIZVODA</th>
                        <th>ŠIFRA</th>
                        <th>KOLIČINA</th>
                        <th class="text-right">CIJENA SA PDV-OM</th>   
                    </tr>

                    @for ($i = 0; $i < 3; $i++)
                        <tr>
                            <td><img height="80px" src="images/products/kumin.jpg"></td>
                            <td>ULJE CRNOG KUMINA <br> 
                                Pakovanje:ml <br>
                                Veličina pakovanja: 250</td>
                        
                            <td>54321</td>
                            <td>
                                <input class="quantity" type="number" value="1">
                            </td>
                            <td class="text-right"><strong >42,99 KM</strong></td>
                        </tr>
                    @endfor

                    <tr class="sum-row">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>UKUPNO</strong></td>
                        <td class="text-right"><strong>99.99 KM</strong></td>
                    </tr>
                    
                </table>

                <div class="line"></div>

                <form action="#">
                    <h2>Podaci za isporuku</h2>

                    <div class="form-group">
                        <label class="my-2">Ime i Prezime</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="my-2">Adresa za Isporuku</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="my-2">Grad</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="spacer-sm"></div>

                    

                    <div class="text-right">
                        <button class="button-primary"><i class="fa fa-shopping-cart mr-3"></i>Poruči</button>
                    </div>

                </form>




            </div>      {{-- End of col 8                  --}}
        </div>      {{-- End of Row  --}}


        <div class="spacer-sm"></div>
        <div class="line"></div>

        <div class="container">
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
        </div>

   
    </div>

@endsection