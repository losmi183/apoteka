<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <!-- <span class="navbar-toggler-icon"></span> -->
          <span class="navbar-toggler-icon">   
                <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
            </span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @foreach ($categories as $category)
                    <li class="nav-item"><a class="nav-link" href="/prodavnica/{{$category->slug}}">{{$category->name}}</a></li>
                @endforeach
            </ul>          
        </div>   

        <div>
            <form class="form-inline" action="/pretraga" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Pretraga" name="tag">
                    <div class="input-group-postpend">
                      <a style="cursor: pointer;" onclick="this.closest('form').submit();return false;" class="input-group-text"><i class="fas fa-search"></i></a>
                    </div>
                </div>
              </form>        
        </div>
    </div>
</nav> <!-- End of Navbar  -->