<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  
  {{-- Fontawsome Icons with my KIT CODE  --}}
  <script src="https://kit.fontawesome.com/7532718861.js"></script>

  <title>Admin | Dashboard</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="/css/app.css" rel="stylesheet">

  {{-- Extra css  --}}
  @yield('extra-css')

</head>

<body>
    
    <!-- Top Navbar  -->
  <div id="top-area">
      <h3 id="brand">Eskulap Apoteka</h3>
      <button title="hide/show sidebar" class="hamburger"><i class="fas fa-bars"></i></button>
  </div>


  <div id="wrapper">

      <!-- Sidebar -->
      <div id="sidebar">

          <ul class="sidebar-list">
              <li class="sidebar-item"><a href="/admin"><i class="fas fa-tachometer-alt"></i></i>Dashboard</a></li>
              <li class="sidebar-item"><a href="/products"><i class="fab fa-product-hunt"></i>Proizvodi</a></li>
              <li class="sidebar-item"><a href="/categories"><i class="fas fa-cogs"></i>Kategorije</a></li>
              <li class="sidebar-item"><a href="/admin/orders"><i class="fas fa-shipping-fast"></i></i>Porudzbine</a></li>
              <li class="sidebar-item"><a href="/users"><i class="fas fa-cogs"></i>User managment</a></li>
              <li class="sidebar-item"><a href="/"><i class="fas fa-home"></i>Frontend</a></li>
              <li class="sidebar-item"><a href="/products"><i class="fas fa-sign-out-alt"></i>Izloguj se</a></li>
          </ul>
  
      </div>
      <!-- /#sidebar-wrapper -->

      <div id="content">
          @include('admin.admin-messages')
          @yield('content')

      </div>
  </div>

  <script src="/js/app.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

  {{-- extra JS  --}}
  @yield('extra-js')

</body>

</html>
