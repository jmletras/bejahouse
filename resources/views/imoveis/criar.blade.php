@extends('app')

@section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-1 text-white animated slideInDown">Imóveis</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="/">Principal</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">Imóveis</li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Adicionar novo</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->
	
<div class="container-xxl py-2">
    <div class="container">
        <div class="row g-3">
            
            <form name="imovel" role="form" files="true" class="form-horizontal" enctype="multipart/form-data" id="employee" method="post" action="{{ url('imoveis') }}">
                @csrf
                @include('imoveis.form')
            </form>
	    </div>
    </div>
</div>

@endsection