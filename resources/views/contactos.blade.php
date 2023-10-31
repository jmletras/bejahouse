@extends('app')

@section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-1 text-white animated slideInDown">Contactos</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb text-uppercase mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Principal</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Contactos</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Appointment Start -->
<div class="container-xxl py-5">
    @if(\Session::has('success'))
        <div class="alert alert-success" role="alert">
            {!! \Session::get('success') !!}
        </div>
    @endif
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h4 class="section-title">Contacte-nos</h4>
                <p class="mb-4">Entre em contacto conosco para mais informações sobre um imóvel, para agendar visitas ou para ajudá-lo a encontrar uma solução à sua medida. </p>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-light" style="width: 65px; height: 65px;">
                                <i class="fa fa-2x fa-phone-alt text-primary"></i>
                            </div>
                            <div class="ms-4">
                                <p class="mb-2">Telefone</p>
                                <h3 class="mb-0">961 074 726</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-light" style="width: 65px; height: 65px;">
                                <i class="fa fa-2x fa-envelope-open text-primary"></i>
                            </div>
                            <div class="ms-4">
                                <p class="mb-2">Email</p>
                                <h3 class="mb-0">bejahouseimobiliaria@gmail.com</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <form action="{{ url('enviar_contacto')}}" method="post" role="form">
					{{csrf_field()}}
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-control" name="nome" placeholder="Nome" style="height: 55px;">
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="email" class="form-control" name="email" placeholder="Email" style="height: 55px;">
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="text" class="form-control" placeholder="Telefone" style="height: 55px;">
                        </div>
                        <div class="col-12 col-sm-6">
                            <select name="assunto" class="form-select" style="height: 55px;">
                                <option selected>Referência Imóvel</option>
                                <option value="1">Service 1</option>
                                <option value="2">Service 2</option>
                                <option value="3">Service 3</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" rows="5" name="mensagem" placeholder="Mensagem"></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Appointment End -->

@endsection