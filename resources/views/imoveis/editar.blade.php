@extends('app')

@section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-1 text-white animated slideInDown">Imóveis</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Principal</a></li>
                <li class="breadcrumb-item text-primary"><a class="text-white" href="{{ url('imoveis') }}">Imóveis</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">Editar imóvel</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<div class="container-xxl py-2">
    <div class="container">
        <div class="row g-3">
                <div style="display:flex; justify-content: space-between">
                    <h1>Editar imóvel - {{$title}} <br> <small style="color:#EFEEEE;">Ref.111</small></h1>
                    @if(Auth::user())
                        <form method="DELETE" enctype="multipart/form-data" files="true" action="{{ route('imoveis.destroy', $imovel->id) }}">
                            <button onClick="return confirm('Tem a certeza que deseja apagar este imóvel?')"; style="padding: 1em;" class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash fa-lg"> </i>  Apagar</button>
                        </form>
                    @endif
                </div>
                
            
            <form method="post" enctype="multipart/form-data" files="true" action="{{ route('imoveis.update', $imovel->id) }}">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                @include('imoveis.form')
            </form>
	    </div>
    </div>
</div>

@endsection