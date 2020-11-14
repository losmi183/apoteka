<div class="container">
    <div class="row">
        <div id="header-top-left" class="col-lg-5 mt-3">
            <small>Dobrodošli, možete se <a href="">prijaviti</a>  ili <a href="">registrovati</a> </small>
        </div>
        <div class="col-lg-7 mt-3 header-top-right d-flex flex-wrap">
            <a href="#"><i class="fa fa-user"><span>Moji&nbsp;Podaci</span></i></a>
            <a href=""><i class="fas fa-flag"><span>Moje&nbsp;Porudzbine</span></i></a>
            <a href=""><i class="far fa-heart"></i><span>Lista&nbsp;Želja</span></i></a>

            {{-- Login and Register Links  --}}
            @guest
                @if (Route::has('login'))
                    <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i><span>Prijavi&nbsp;se</span></i></a>
                @endif
                    
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i><span>Registruj&nbsp;se</span></i></a>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest

        </div>

        <div class="col-lg-5 header-bottom-left" >
            <div class="logo"><img class="img-fluid" src="/images/eskulapLogo.jpg" alt="Sc Eckulap Apoteka"></div>
        </div>

        <div class="col-lg-7 header-bottom-right">
            <span class="phone">+387 (0)56 410 827</span>
            <div class="search-input">
                <div class="input-container">

                    <form action="/search" method="GET">
                        
                        <input name="search" type="text" placeholder="PRETRAGA">                    
                        <button id="search-link"><i class="fa fa-search"></i></button>
                    </form>

                </div>
            </div>
            <a class="cart-button"><i class="fas fa-shopping-cart"></i>Proizvod (0)</a>        
        </div>

    </div>
</div>