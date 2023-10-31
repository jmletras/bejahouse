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
                <li class="breadcrumb-item text-primary" aria-current="page">Editar imóvel</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<div class="container-xxl py-2">
    <div class="container">
        <div class="row g-3">

            <h1>Editar imóvel - {{$title}} <small style="color:#EFEFEF;">Ref.111</small></h1>
            <form method="DELETE" enctype="multipart/form-data" files="true" action="{{ route('imoveis.destroy', $imovel->id) }}">
		    <button onClick="return confirm('Tem a certeza que deseja apagar este imóvel?')"; class="btn btn-danger btn-sm" type="submit">Apagar este imóvel</button>
            </form>

            <form method="post" enctype="multipart/form-data" files="true" action="{{ route('imoveis.update', $imovel->id) }}">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                @include('imoveis.form')
            </form>
	    </div>
    </div>
</div>

@endsection