<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
    <link rel="icon" href="{{asset('favicon.ico')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" crossorigin="anonymous"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('base.css')}}">
    <script defer src="{{asset('modal.js')}}"></script>
    <script defer src="{{asset('base.js')}}"></script>

</head>
<header>
    <nav id="1" class="navbar navbar-expand-md">
        <div class="container-fluid">
            <div class="site-logo">
                <a href="/" rel="home">
                    <img src="{{asset('favicon.ico')}}" alt="LOGO" width="50" height="50" class="header image is-logo-image lazy loaded">
                </a>
            </div>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <div id="menu0" class="dropdown">
                        <button id="bouton-affiche-masquer-division" class="btn btn-secondary dropdown-toggle" >
                            Service
                        </button>
                        <div id="deroulante" class="">
                            <a class="dropdown-item " href="">CHEF</a>
                            <a class="dropdown-item" href="">BAG</a>
                            <a class="dropdown-item" href="">BC</a>    
                        </div>
                    </div>
                </ul>
                <div class="navbar-nav ms-auto">
                    @auth
                        <button class="btn btn-medium">{{Auth::user()->name}}</button>
                        <form class="nav-item" action="{{route('logout')}}" method="POST">
                            @method("delete")
                            @csrf
                            <button class="btn btn-black">se deconnecter</button>
                        </form>
                    @endauth
                    @guest
                        <div class="nav-item">
                            <a href="{{route('login')}}">se connecter</a>
                        </div>
                    @endguest
                </div>
            </div>  
        </div>
    </nav>
</header>

<body>
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    @yield('content')
</div>
    
</body>
</html>