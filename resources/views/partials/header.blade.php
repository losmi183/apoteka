<header>
    <div class="top-header">   
        <div class="container d-flex justify-content-between align-items-center">

            <div class="top-left">
                <div class="">
                    <a href="tel:38756410828">
                        <i class="fas fa-info-circle m-0"></i>
                        <span class="text-nowrap">info:+387 56 410 828</span>
                    </a>
                </div>
            </div> <!-- End of top-left  -->
            
           
            <div class="top-right d-flex align-items-center">  

            @guest
                <div class="signih">
                    <a href="{{route('login')}}">
                        <i class="fas fa-sign-in-alt"></i>
                        <span class="mobile-hide">Prijava</span>
                    </a>
                </div>
                <div class="signup">
                    <a href="{{route('register')}}">
                        <i class="fas fa-sign-in-alt"></i>
                        <span class="mobile-hide">Registracija</span>
                    </a>
                </div>
                @else
                
                @if (backendAccess())
                    <div class="signup">
                        <a href="/admin">
                            <i class="fas fa-user-cog"></i>
                            <span class="mobile-hide">Admin</span>
                        </a>
                    </div>
                @endif
   
                <div class="dropdown">
                    <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        <span class="mobile-hide">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </span>
                    </a>
    
                    <div class="dropdown-menu dropdown-menu-right p-0 m-0" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item border-bottom my-2" href="/moje-porudzbine">Moje porudzbine</a>  
                        <a class="dropdown-item border-bottom my-2" href="/moj-profil">Moj Profil</a>                        

                        <a class="dropdown-item border-bottom my-2" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            Izloguj se
                        </a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
                
                <!-- Cart Icon and count Component  -->
                <div class="cart-component">
                    <a href="/cart">
                        <span class="shoping-cart">
                            <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                            @if (Cart::count())
                                <small id="cart-counter">{{ Cart::count() }}</small>
                            @endif
                            <span class="mobile-hide">Korpa</span>
                        </span>
                    </a>                    
                </div><!-- End of Cart Dropdown Component  -->         


            </div> <!-- End of top-right  -->

        </div> <!-- End of container  -->           
    </div>  <!-- End of top-header  -->

    <div class="middle-header">
        <div class="container" >
            <div class="row no-gutters">
                
                <div class="col-md-4 col-8 d-flex align-items-right">
                    <div class="logo-wrapper" >
                        <div data-aos="zoom-in-down" data-aos-duration="1000">
                            <a href="/">
                                <img src="/images/logo-final.png" >
                            </a>
                        </div>
                        <!-- <img class="img-fluid" src="images/eskulap.png" alt="">
                        <div class="effects">
                            <img class="img-fluid img-effect" src="images/pehar.png" data-aos="fade-down" data-aos-duration="300">
                            <img class="img-fluid img-effect" src="images/f.png" data-aos="fade-up" data-aos-duration="200" data-aos-delay="200">
                            <img class="img-fluid img-effect" src="images/a.png" data-aos="fade-up" data-aos-duration="200" data-aos-delay="400">
                            <img class="img-fluid img-effect" src="images/r.png" data-aos="fade-up" data-aos-duration="200" data-aos-delay="600">
                            <img class="img-fluid img-effect" src="images/m.png" data-aos="fade-up" data-aos-duration="200" data-aos-delay="800">
                        </div> -->
                    </div>
                </div>

                <div class="col-md-4 d-md-flex d-none  mail-wrapper">
                    <a href="mailto:info@eskulap-farm.com">
                        <i class="far fa-envelope"></i> 
                        info@eskulap-farm.com
                    </a>
                </div>

                <div class="col-md-4 col-4  social-wrapper">
                    <a href="https://m.facebook.com/eskulap.farm/?ref=page_internal&mt_nav=0"><i class="fab fa-facebook"></i></a>
                    <a href="viber://contact?number=%2B38756410828"><i class="fab fa-viber"></i></a>
                    <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>                        
                </div>
                
                <!-- <div class="col-md-4 search-wrapper">    
                    <form class="form-inline" action="/action_page.php">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="PRETRAGA">
                            <div class="input-group-postpend">
                              <a href="#" class="input-group-text"><i class="fas fa-search"></i></a>
                            </div>
                        </div>
                      </form>        
                </div> -->
                


            </div>
        </div>
    </div>
</header>