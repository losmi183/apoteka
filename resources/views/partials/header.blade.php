<header>
    <div class="top-header">   
        <div class="container d-flex justify-content-between align-items-center">

            <div class="top-left">
                <div class="mr-sm-4">
                    <a href="tel:38756410828">
                        <i class="fas fa-info-circle"></i>
                        info:+387 56 410 828
                    </a>
                </div>
            </div> <!-- End of top-left  -->
            
           
            <div class="top-right d-flex align-items-center">  

                <!-- Login Dropdown component  -->
                <div class="login-component">

                    <a id="login-dropdown" class=" mr-2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i><span class="mobile-hide">Moj nalog</span>
                    </a>  

                    <div class="login-content dropdown-menu dropdown-menu-right" aria-labelledby="login-dropdown">
                        <a class="text-right" id="close"><i class="fas fa-window-close" aria-hidden="true"></i></a> <br>                                
                        <h5>Prijava korisnika</h5> <hr>
                        <form action="">
                            <div class="form-group">
                                <label>Email adresa</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Lozinka</label>
                                <input type="text" class="form-control">
                            </div>
                            <button class="btn btn-primary btn-block">Prijavite se</button>
                        </form>
                        <br>
                        <a href="">Zaboravili ste lozinku</a>
                        <br>
                        <button class="btn btn-secondary btn-block">Napravite nalog</button>
                    </div>
                    
                </div><!-- End Login Dropdown component  -->
                
                <!-- Cart Dropdown Component  -->
                <div class="cart-component">
                    <a id="cart-dropdown" class="" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="shoping-cart">
                            <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                            <small>2</small>
                            <span class="mobile-hide">Korpa</span>
                        </span>
                    </a>
                    <div id="cart-preview" class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <div id="close-cart" class="d-flex justify-content-end"><i class="fas fa-window-close"></i></div>
                             <hr>
                            <div class="item">
                                <img height="64px" src="images/products/1.jpg" alt="">
                                <div class="item-info">
                                    <h5>Ulje crnog kumina</h5>
                                    <span>2 X <strong>14.95 KM</strong></span>
                                </div>
                                <i class="fas fa-window-close"></i>
                            </div> <hr>
                            <div class="item">
                                <img height="64px" src="images/products/2.jpg" alt="">
                                <div class="item-info">
                                    <h5>Ulje crnog kumina</h5>
                                    <span>2 X <strong>14.95 KM</strong></span>
                                </div>
                                <i class="fas fa-window-close"></i>
                            </div> <hr>
                            <div class="item">
                                <img height="64px" src="images/products/3.jpg" alt="">
                                <div class="item-info">
                                    <h5>Čaj za upalu mokraćnih kanala</h5>
                                    <span>2 X <strong>14.95 KM</strong></span>
                                </div>
                                <i class="fas fa-window-close"></i>
                            </div> <hr>
                            <div class="cart-sum">
                                <h3>Ukupno</h3 >
                                <strong>49.99 KM</strong>
                            </div>
                            <div class="cart-buttons">
                                <a href="?korpa" class="btn btn-primary btn-sm btn-block">Korpa</a>
                                <a href="#" class="btn btn-secondary btn-sm  btn-block">Plaćanje</a>
                            </div>
                    </div> <!-- End of Cart preview  -->
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