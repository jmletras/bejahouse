<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bejahouse - Imobiliária</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Java script -->
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
  
  @if(isset($metadata))
		<meta property="og:image" content="/fotos_imoveis/{{$metadata}}"/>
		<meta property="og:image:secure_url" content="/fotos_imoveis/{{$metadata}}" />
		<meta property="og:title" content="{{$title}}" />
		<meta property="og:description" content="{{$descricao}}" />
	  
	@endif
</head>
<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="{{url('/')}}" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="text-primary m-0"><img class="navbar_logo me-3" src="{{ asset('img/logo_beja_house_small.png')}}" alt="Icon"></h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{url('/')}}" class="nav-item nav-link {{ (request()->is('/') or request()->is('home')) ? 'active' : ''}}">Principal</a>
                <a href="{{ url('imoveis') }}" class="nav-item nav-link {{ request()->is('imoveis') ? 'active' : ''}}">Imóveis</a>
                <a href="{{ url('sobre') }}" class="nav-item nav-link {{ request()->is('sobre') ? 'active' : ''}}">Sobre</a>                
                <a href="{{ url('contactos') }}" class="nav-item nav-link {{ request()->is('contactos') ? 'active' : ''}}">Contactos</a>
                
                @if(Auth::user())
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle show" data-bs-toggle="dropdown" aria-expanded="true">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu border-0 m-0 show" data-bs-popper="none">
                            <a href="{{ url('imoveis/create') }}" class="dropdown-item">Novo imóvel</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item">Sair</a>                                
                            </form>
                        </div>
                    </div>
                @endif
            </div>            
        </div>
    </nav>
    <!-- Settings Dropdown -->
    
    
    <!-- Navbar End -->

    <main id="main">
		@yield('content')
	</main><!-- End #main -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-body footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 col-md-6">
                    <h3 class="text-light mb-4">Contactos</h3>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>Estrada da Circunvalação, 28, 7940-195 Cuba</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary me-3"></i>961 074 726</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>bejahouseimobiliaria@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-body me-1" href="https://www.facebook.com/BEJAHOUSE/"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h3 class="text-light mb-4">Menu</h3>
                    <a class="btn btn-link" href="{{ url('sobre') }}">Sobre</a>
                    <a class="btn btn-link" href="{{ url('contactos') }}">Contactos</a>
                    <a class="btn btn-link" href="{{ url('imoveis') }}">Imóveis</a>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="/">Beja House Imobiliária</a>, 2023. Todos os direitos reservados.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js')}}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js')}}"></script>
    <script src="{{ asset('js/slideshow.js')}}"></script>

</body>