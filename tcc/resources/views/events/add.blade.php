@extends('layouts.pages')

@section('title', 'Página do Evento')

@section('content')

<!-- form -->
<form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div id="AddFoto" class="container text-center event-grid">
        <div class="row g-0">
        <div class="col d-flex justify-content-center col-md-4">
            <div class="card" style="width: 18rem;">
            <img src="/img/events/{{ $event->image }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $event->name }}</h5>
                <h5 class="card-title">{{ $event->quantidade_fotos }}</h5>
                <p class="card-text">{{ $event->created_at->format('d-m-Y') }}</p>
                <a href="#" class="btn btn-primary stretched-link">Adicionar Fotos</a>
            </div>
            </div>
        </div>
