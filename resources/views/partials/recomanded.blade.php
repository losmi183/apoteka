

    <div class="col-12">
        <h2 class="sub-title-line">Preporučeni proizvodi</h2>
    </div>

    @foreach ($randomProducts as $product)        
        <div class="col-md-3 box1">
            <div class="shop-image">
                <a href="/product/{{$product->id}}">
                    <img class="img-fluid" src="/images/products/{{$product->image}}">
                </a>
            </div>
            <h3>{{$product->ime}}</h3>
            <p>{{ Str::words($product->opis, 10) }}</p>

            <hr>

            <div class="box-bottom d-flex justify-content-between">
                <p>{{$product->cena}}</p>
                <div class="box-actions">
                    {{-- <span class="sr-only">Dodaj u korpu</span> --}}
                    <a data-toggle="tooltip" data-placement="top" title="Dodaj u korpu" href=""><i  class="fa fa-plus-circle"></i></a>
                    <a data-toggle="tooltip" data-placement="top" title="Dodaj u listu želja" href=""><i class="fa fa-heart"></i></a>
                    <a data-toggle="tooltip" data-placement="top" title="Uporedi Proizvod" href=""><i class="fa fa-eye"></i></a>
                </div>
            </div>
        </div>
    @endforeach




