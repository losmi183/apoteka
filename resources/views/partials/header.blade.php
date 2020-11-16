<div class="container" id="top">
    <div class="row">
        <div class="col-lg-4 mt-3 header-top-left">
            <p id="small-logo">ONLINE APOTEKA</p>
        </div>


        <div class="col-lg-8 mt-3 header-top-right d-flex flex-wrap justify-content-end">
            <div>

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
    
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        {{ __('Logout') }}
                    </a>
    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
    
                        {{-- <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            
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
                        </div> --}}
                @endguest

                <a href=""><i class="fas fa-shopping-cart"></i><span>Korpa(1)</span></i></a>
    
                {{-- <a href="">
                    <i class="fas fa-shopping-cart">Korpa(0)
                </a> --}}
            </div>

        </div>
    </div>
</div>

<hr>

<div class="container">
    <div class="row">
        <div class="col-lg-5 header-bottom-left" >
            <div class="logo"><img class="img-fluid" src="/images/logo2.jpg" alt="Sc Eckulap Apoteka"></div>
        </div>

        <div class="col-lg-7 header-bottom-right d-flex justify-content-end">
            <div>
                <span class="phone mb-2">+387 (0)56 410 827</span>
                <span class="viber mb-2"><i class="fab fa-viber"></i>Viber</span>
                <div class="search-input mb-2">
                    <form action="/pretraga" method="GET">
                        <input type="text" name="search" placeholder="PRETRAGA" class="rounded-input">
                        <button class="search-button"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>


        </div>

    </div>
</div>