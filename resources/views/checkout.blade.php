@extends('layouts.app')

@section('content')
  <form action="/order" method="POST">
        @csrf

<div id="cart" class="container">  

    <div class="row">
        <div class="col-12">    
            <div class="my-4"></div>
            <h3 class="title-primary">Plaćanje</h3>
            <div class="mb-4"></div>
            <div class="alert alert-primary">Već imate nalog? <span class="ml-4 text-primary"><a href="">Prijavite se</a></span></div>           
        </div>        {{-- End Col 12  --}}

        <div class="col-12 col-lg-6 col-xl-7">
            <div class="user-data border p-3">
                <h3 class="title-primary mb-4">Ukupno u korpi</h3>               
                    
                    {{-- Ime  --}}
                    <div class="form-group">
                        <label class="">Ime i prezime <span class="text-danger">*</span></label>        
                        <input required type="text" class="form-control @error('ime') is-invalid @enderror" name="ime" value="{{ old('ime') }}"  autocomplete="ime" autofocus>    
                        @error('ime')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                  
                    </div>

                    {{-- Email  --}}
                    <div class="form-group">
                        <label class="">Email <span class="text-danger">*</span></label>        
                        <input required type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>    
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                  
                    </div>

                    {{-- Adresa  --}}
                    <div class="form-group">
                        <label class="">Adresa <span class="text-danger">*</span></label>        
                        <input required type="text" class="form-control @error('adresa') is-invalid @enderror" name="adresa" value="{{ old('adresa') }}"  autocomplete="adresa" autofocus>    
                        @error('adresa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                  
                    </div>

                    {{-- Telefon  --}}
                    <div class="form-group">
                        <label class="">Telefon <span class="text-danger">*</span></label>        
                        <input required type="number" class="form-control @error('telefon') is-invalid @enderror" name="telefon" value="{{ old('telefon') }}"  autocomplete="telefon" autofocus>    
                        @error('telefon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                  
                    </div>

                    {{-- Grad  --}}
                    <div class="form-group">
                        <label class="">Grad <span class="text-danger">*</span></label>        
                        <input required type="text" class="form-control @error('grad') is-invalid @enderror" name="grad" value="{{ old('grad') }}"  autocomplete="grad" autofocus>    
                        @error('grad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                  
                    </div>

                    {{-- Postanski  --}}
                    {{-- <div class="form-group">
                        <label class="">Postanski broj <span class="text-danger">*</span></label>        
                        <input type="number" class="form-control @error('postal') is-invalid @enderror" name="postal" value="{{ old('postal') }}"  autocomplete="postal" autofocus>    
                        @error('postal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                  
                    </div> --}}


                    
                    {{-- Dodatne napomene  --}}
                    <div class="form-group">
                        <label class="">Dodatne napomene <span class="text-danger">*</span></label>        
                        <textarea name="napomene" class="form-control @error('napomene') is-invalid @enderror"  cols="30" rows="5" name="napomene">{{ old('napomene') }}</textarea>
                        @error('napomene')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                  
                    </div>
                
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-5">
            <div class="order-data border p-3">
                <h3 class="title-primary mb-4">Ukupno u korpi</h3>

                <div class="d-flex justify-content-between">
                    <p class="font-weight-bold">Proizvod</p>
                    <p class="font-weight-bold text-right">Ukupno</p>
                </div>
                <hr>

                @foreach (Cart::content() as $item)
                    <div class="d-flex justify-content-between">
                        <p>{{ $item->name }} x {{ $item->qty }}</p>
                        <p>{{ presentPrice($item->price) * $item->qty }}</p>
                    </div>                    
                @endforeach
                <hr>
                <div class="d-flex justify-content-between mb-5">
                    <h3 class="font-weight-bold">Ukupno</h3>
                    <h3 class="">{{ presentPrice(Cart::subtotal()) }} KM</h3>
                </div>

                <p class="mb-3">Cena dostave može da varira u zavisnosti od težine paketa i izbora kurirske službe. Maslina MM ima potpisan ugovor sa PostExpress i Bex kurirskim službama. Ukoliko preferirate jednu od navedenih kurirskih službi, molimo vas, navedite to u napomeni.</p>
                <p class="mb-3">Za porudžbine vrednosti <span class="text-weight-blod">5000</span> KM i preko navedenog iznosa poštarina je besplatna.</p>
                
                <input type="checkbox" id="accept" value="false">
                <label>Slažem se sa uslovima korišćenja *
                </label><br>

                <button id="submit-disabled" disabled class="btn btn-primary btn-block not-allowed">Poruči</button>
                <button id="submit-enabled" class="btn btn-primary btn-block">Poruči</button>

            </div>
            <p class="mt-1">Sva polja obeležena sa ( * ) su obavezna.</p>
        </div>
    


    </div>    {{-- End ROW  --}}
</div>{{-- End Container  --}}

</form>

<div class="my-4"></div>

@endsection

@section('extra-js')
    <script>
        $(document).ready(function() {
            
            $('#accept').click(function() {
                if( $(this).prop('checked') == true ) {
                    // $('#submit').prop('disabled', false);
                    $('#submit-disabled').hide();
                    $('#submit-enabled').show();
                }
                else {
                    // $('#submit').prop('disabled', true);
                    $('#submit-enabled').hide();
                    $('#submit-disabled').show();
                }
            })

        });
    </script>
    
@endsection

