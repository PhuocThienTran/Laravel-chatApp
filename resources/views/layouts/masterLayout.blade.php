{{-- Master Template page: common structure for relevant pages --}}

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>@yield('title')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">
        <!-- Bootstrap core CSS -->
        <link href="{{asset('css/Core/bootstrapCore.css')}}" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{{asset('css/carousel.css')}}" rel="stylesheet">
  </head>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/home">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url("friendship/create")}}">Add Friends</a>
                    </li>
                </ul>
                {{-- Logout --}}
                @auth
                    <form class="d-flex" method="POST" action="{{url('/logout')}}">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-outline-success" value="Logout">Logout</button>
                    </form>
                @endauth
                </div>
            </div>
        </nav>
    </header>

    <body>
      @yield('content')
    </body>

</html>