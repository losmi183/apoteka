<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
        <a class="navbar-brand d-none" href="/">
          <img id="navbar-logo" class="img-fluid" src="/images/logo2.jpg" alt="Sc Eckulap Apoteka">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="/">NASLOVNA</a></li>
            {{-- <li class="nav-item"><a class="nav-link" href="/prodavnica">PRODAVNICA</a></li> --}}
            {{-- <li class="nav-item"><a class="nav-link" href="/">AKCIJE</a></li> --}}

            @foreach ($categories as $category)
              <li class="nav-item">
                <a class="nav-link
                  @isset($selected_category)
                      {{ isActive($selected_category->id, $category->id) }}
                  @endisset                 
                " href="/prodavnica/{{$category->slug}}">{{$category->name}}</a>
              </li>
            @endforeach
          </ul>
      
        </div>
      </div>
    </nav>
