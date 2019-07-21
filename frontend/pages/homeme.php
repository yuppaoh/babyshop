<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login form</title>
    <link rel="stylesheet" type="text/css" href="/babyshop/assets/vendor/bootstrap/css/bootstrap.min.css">
    
    <style type="text/css">
      div{
        border: 1px solid red;
      }

    </style>
</head>
<body>
<!--menu header-->  
<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Babyshop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Giới thiệu</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" id="login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</header>
<!--end menu header-->  

<main role="main">
<div class="container">
  <div class="row">
  <nav class="col-md-2">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item btn-outline-success">
                <a class="nav-link" href="#">
                    <span data-feather="#"></span>
                    Home <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item btn-outline-success">
                <a class="nav-link" href="#">
                    <span data-feather="#"></span>
                    List of product <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item btn-outline-success">
                <a class="nav-link" href="#">
                    <span data-feather="#"></span>
                    Login <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item btn-outline-success">
                <a class="nav-link" href="#">
                    <span data-feather="#"></span>
                    About us <span class="sr-only">(current)</span>
                </a>
            </li>

        </ul>
    </div>
  </nav>


  <main class="col-md-10">
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-4">
            <img class="img-fluid" width="100px" src="../../assets/uploads/ipad-4-wifi-16g.jpg"/>
          </div>
          <div class="col-md-8">noi dung</div>
        </div>
      </div>

      <div class="col-md-6">san pham 2</div>
    </div>
  </main>
  </div>
    
</div>
</main>


<footer class="footer alert-dark" style="padding-left: 240px; padding-top: 10px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 my-auto h-100 text-center text-lg-left">
                <ul class="list-inline mb-2">
                    <li class="list-inline-item">
                        <span id="ft">&copy; <a href="https://github.com/yuppaoh">yuppaoh  - 2019</a></span>
                    </li>
                    <li class="list-inline-item"><span>>></span></li>
                    <li class="list-inline-item"><a href="#">Home</a></li>
                    <li class="list-inline-item"><span>⋅</span></li>
                    <li class="list-inline-item"><a href="#">Contact</a></li>
                    <li class="list-inline-item"><span>⋅</span></li>
                    <li class="list-inline-item"><a href="#">Products</a></li>
                    <li class="list-inline-item"><span>⋅</span></li>
                    <li class="list-inline-item"><a href="#">Login</a></li>
                </ul>
            </div>
            
        </div>
    </div>
</footer>

</body>

<script src="/babyshop/assets/jquery/jquery-3.4.1.min.js"></script>
<script src="/babyshop/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</html>
