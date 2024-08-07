@extends('layouts.main')

@section('title', 'Fotografia Esportiva')

@section('content')

    </head>
    <div id="BackgroundCarousel" class="carousel slide carousel-fade">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#BackgroundCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#BackgroundCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#BackgroundCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
            <div class="carousel-item active c-item">
                <img src="\img\bg6.jpeg" class="d-block w-100 c-img" alt="imagem-1">
            </div>
            <div class="carousel-item c-item">
                <img src="\img\bg3.jpeg" class="d-block w-100 c-img" alt="imagem-2">
            </div>
            <div class="carousel-item c-item">
                <img src="\img\bg5.jpeg" class="d-block w-100 c-img" alt="imagem-3">
            </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#BackgroundCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#BackgroundCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="d-flex justify-content-center title-footer">
            <h2 class="text-align-center" >Últimos Eventos</h2>
        </div>

        <!-- Cards -->

        <div class="container text-center event-grid ">
            <div class="row g-0">
            <div class="col d-flex justify-content-center col-md-4">
                <div class="card" style="width: 18rem;">
                <img src="\img\bg2.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Misiones 2022</h5>
                    <p class="card-text">12/10/2022</p>
                    <a href="#" class="btn btn-primary stretched-link">Ver Evento</a>
                </div>
                </div>
            </div>
            <div class="col d-flex justify-content-center col-md-4">
                <div class="card" style="width: 18rem;">
                <img src="\img\bg8.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Misiones 2022</h5>
                    <p class="card-text">12/10/2022</p>
                    <a href="#" class="btn btn-primary stretched-link">Ver Evento</a>
                </div>
                </div>
            </div>
            <div class="col d-flex justify-content-center col-md-4">
                <div class="card" style="width: 18rem;">
                <img src="\img\bg9.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Misiones 2022</h5>
                    <p class="card-text">12/10/2022</p>
                    <a href="#" class="btn btn-primary stretched-link">Ver Evento</a>
                </div>
                </div>
            </div>
            </div>
        </div>

@endsection
