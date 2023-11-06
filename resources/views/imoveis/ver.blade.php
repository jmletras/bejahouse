@extends('app')

@section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-1 text-white animated slideInDown">Imóveis</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Principal</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page"><a class="text-white" href="{{ url('imoveis') }}">Imóveis</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">{{$title}}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
	
<!-- Feature Start -->
<div class="container-xxl py-4">
        <div class="container">
            <div class="py-1 col-md-12">
                <a href="{{ url()->previous() }}"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>  Voltar </a>
            </div>
            
            <div class="row g-5">
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-6 mb-2">{{$title}}</h1>
                    <p class="text-primary" style="font-size: 1.6rem;" ><b>{{$imovel->preco}} </b><i class="fas fa-euro-sign"></i></p>
                    <p class="pt-3 pb-5">{{$imovel->descricao}}</p>
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="summary-list">
                                <ul style="padding-left: 0px;" class="list">
                                    <li class="d-flex justify-content-between"><h4>Referência</h4><span>{{$imovel->reference?:"-"}}</span></li>
                                    <li class="d-flex justify-content-between"><h4>Localidade</h4><span>{{$imovel->ref_localidade ? $imovel->ref_localidade->nome_localidade : "-"}}</span></li>
                                    <li class="d-flex justify-content-between"><h4>Natureza</h4><span>{{$imovel->natureza?:"-"}}</span></li>
                                    <li class="d-flex justify-content-between"><h4>Tipo de negócio</h4><span>{{$imovel->tipo_negocio?:"-"}}</span></li>
                                    <li class="d-flex justify-content-between"><h4>Estado</h4><span>{{$imovel->status?:"-"}}</span></li>
                                    <li class="d-flex justify-content-between"><h4>Área</h4><span>{{$imovel->area_bruta?:"-"}}m<sup>2</sup></span></li>
                                    <li class="d-flex justify-content-between"><h4>Tipologia</h4><span>{{$imovel->tipologia?:"-"}}</span></li>
                                    <li class="d-flex justify-content-between"><h4>Ano de construção</h4><span>{{$imovel->tipo_negocio?:"-"}}</span></li>
                                    <li class="d-flex justify-content-between"><h4>Categoria energética</h4><span>{{$imovel->categoria_energetica?:"-"}}F</span></li>
                                </ul>

                                @if(Auth::user())
                                    <a href="{{ route('imoveis.edit', $imovel) }}" class="btn btn-primary py-3 px-5 mt-3">Editar imóvel</a>
                                @endif
                            </div>                            
                        </div>    
                    </div>
                </div>
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.5s">
                    <!-- Slideshow container -->
                    <div class="slideshow-container">

                        @foreach($imovel->fotos as $foto) 
                        <div class="mySlides slideshow_fade">                            
                            <img src="{{ asset('fotos_imoveis/')}}/{{$foto->filename}}" style="width:100%">
                        </div>
                        @endforeach
                        @if(count($imovel->fotos) > 1)                        
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        @endif
                    </div>

                    <!-- The dots/circles -->
                        
                    <div class="mt-2" style="text-align:center">
                        @if(count($imovel->fotos) > 1) 
                            @foreach($imovel->fotos as $foto)
                                <span class="dot" onclick="currentSlide({{$loop->iteration}})"></span>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

@endsection