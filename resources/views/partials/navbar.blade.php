<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        {{-- <a class="navbar-brand" href="/">NASLOVNA</a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="/">NASLOVNA</a></li>
            <li class="nav-item"><a class="nav-link" href="/shop">PRODAVNICA</a></li>
            <li class="nav-item"><a class="nav-link" href="/">AKCIJE</a></li>

            @foreach ($categories as $category)
              <li class="nav-item"><a class="nav-link" href="/shop/{{$category->id}}">{{$category->name}}</a></li>
            @endforeach
          </ul>
      
        </div>
      </nav>
</div>
