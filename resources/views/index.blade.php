@extends('app')

@section('content')
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border position-relative text-primary" style="width: 6rem; height: 6rem;" role="status"></div>
        <img class="position-absolute top-50 start-50 translate-middle" src="img/icons/icon-1.png" alt="Icon">
    </div>
    <!-- Spinner End -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative" data-dot="<img src='img/carousel-1.jpg'>">
                <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                <div class="owl-carousel-inner">
                    <div class="container p-4">
                        <div class="row justify-content-start">
                        <h1 class="display-1 text-white animated slideInDown">Encontre aqui o imóvel dos seus sonhos</h1>
                            <div class="col-md-6 py-2">
                                <!-- <div class="col-md-6 "> -->
                                <form action="{{url('/imoveis')}}" method="GET" class="form">
                                    <!-- <div class="col-md-6 "> -->
                                        <div class="col-md-12">
                                            <label class="control-label fs-5 fw-medium text-white mb-1 pb-1" for="codigo_postal">Localidade</label>
                                            <select style="color: rgb(0,0,0, 0.6); font-size: 1.2em; border:rgb(255,255,255, 0.9);background-color: rgb(255,255,255, 0.5);"  name="localidade" class="form-control form-control-sm">
                                                <option></option>
                                                @foreach($localidades as $localidade)
                                                    <option value="{{$localidade->id}}">{{$localidade->nome_localidade}}</option>
                                                @endforeach                                        
                                            </select>
                                        </div>
                                        <div class='col-md-12 form-group'>
                                            <button type="submit" class='btn-submit'>Procurar</button>
                                        </div>
                                    <!-- </div> -->
                                                              
                                </form>  
                                <!-- </div>  -->
                                                             
                            </div>
                            <div class="col-md-6 py-2" style="display: flex; justify-content: center; align-items: center;"> 
                                <a class="btn btn-index-see_all" href="{{ url('imoveis') }}">
                                    <i class="fas fa-home fa-lg"></i> <br/> 
                                    <span style="font-size: 16px;">Veja todos os nossos imóveis</span>
                                </a> 
                            </div>  
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Facts Start -->
    <div class="container-xxl py-5">
        <div class="container pt-5">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="img/icons/icon-2.png" alt="Icon">
                        </div>
                        <h3 class="mb-3">Os Nossos Serviços 1</h3>
                        <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="img/icons/icon-3.png" alt="Icon">
                        </div>
                        <h3 class="mb-3">Os Nossos Serviços 2</h3>
                        <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="img/icons/icon-4.png" alt="Icon">
                        </div>
                        <h3 class="mb-3">Os Nossos Serviços 3</h3>
                        <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Últimas entradas</h4>
                <!--h1 class="display-5 mb-4">Uma breve introdução</h1-->
            </div>
            <div class="row g-0">
                @foreach($imoveis as $imovel)
                    <div style="" class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a href="{{route('imoveis.show', $imovel)}}">
                            <div  class="team-item position-relative">
                                <div class="position-relative">
                                    @if($imovel->fotos()->count())
                                        <img style="height: 300px; width:100%; object-fit: cover;" class="img-fluid" src="fotos_imoveis/{{$imovel->fotos()->first()->filename}}" alt="">
                                    @else
                                        <img style="height: 300px; width:100%;" class="img-fluid" src="fotos_imoveis/default.jpg" alt="">
                                    @endif
                                    <!--div class="team-social text-center">
                                        <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                                    </div-->
                                </div>
                                <div class="bg-light text-center p-2">
                                    <h3 style="font-size: 22px; margin-bottom: 20px;" class="mt-2">{{$imovel->natureza}} - {{$imovel->tipologia}}</h3> 
                                    <span style="font-size:15px;">{{$imovel->ref_localidade->nome_localidade}}, {{$imovel->ref_concelho->nome_concelho}}</span>
                                    <p class="text-primary">{{$imovel->preco}} €</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->


    
@endsection