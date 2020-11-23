<div class="col-12 d-flex justify-content-right mb-3">
    {{-- {{$products->appends(request()->input())->links()}} --}}
    <div class="sort-price">
        Sortiraj po Ceni 
        {{-- Helper method appendQuery - dodaje queryString prethodnoj ruti  --}}
        <a title="rastuće" href="{{appendQuery('cena', 'rastuce')}}"><i class="fas fa-arrow-circle-up"></i></a>
        <a title="opadajuće" href="{{appendQuery('cena', 'opadajuce')}}"><i class="fas fa-arrow-circle-down"></i></a>
    </div>
</div>