@extends('app')

@section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-1 text-white animated slideInDown">Imóveis</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Principal</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Imóveis</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="section-title">Lista de Imóveis</h4>
            <!--h1 class="display-5 mb-4">We Are Creative Architecture Team For Your Dream Home</h1-->
            @if(Auth::user())
                <a class="btn btn-success btn-sm btn-block p-2 mb-3" role="button" href="{{ url('imoveis/create') }}"><i class="fas fa-plus">  </i> &nbsp; Adicionar novo imóvel</a>
            @endif
        </div>
        <div class="row">
            <div class="col-md-3">
                <h4 >Procurar</h4>
                <hr style="padding: 2px; background-color: #d79b0f;">
                <form action="#" method="GET">
                    <div class="col-md-12">
                        <label class="control-label" for="localidade">Localidade</label>
                        <select class="form-control form-control-sm" name="localidade">
                            <option></option>
                            @foreach($localidades as $localidade)
                                <option @if( isset($_GET["localidade"]) AND ($_GET["localidade"] == $localidade->id)) selected @endif  value="{{$localidade->id}}">{{$localidade->nome_localidade}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="control-label" for="tipologia">Tipologia</label>
                        <select class="form-control form-control-sm" name="tipologia">
                            <option></option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class='btn-submit'>Procurar</button>
                    </div>
                </form>
                @if(isset($_GET["localidade"]))
                    <div class="mt-2 col-md-12">
                        <a href="{{url('imoveis')}}" class="w-100 btn btn-secondary ">Limpar filtros</a>
                    </div>
                @endif
            </div>
            <div class="col-md-9">
                <div class="col-md-12 mb-3">
                    @if(isset($_GET["localidade"]))
                        <span style="font-size: 12px;">Filtrando por: Localidade - <b>{{$query_localidade->nome_localidade}}</b>.</span>
                    @endif
                    <span style="font-size: 12px;"> Encontrados {{$imoveis->count()}} imóvei(s).</span>
                </div>
                
                <div style="display: flex;" class="row g-0 team-items">
                    @foreach($imoveis as $imovel)            
                        <div style="padding-bottom: 100%; margin-bottom: -100%;" class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
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
                                        <p class="text-primary">{{$imovel->preco}} <i class="fas fa-euro-sign"></i></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    
                    @endforeach            
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

@endsection