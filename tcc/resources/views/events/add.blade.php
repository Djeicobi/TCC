@extends('layouts.pages')

@section('title', 'Página do Evento')

@section('content')

<!-- form -->
<form action="{{ route('events.photo', ['id' => $event->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name= "id" value="{{ $event->id }}">
    <div id="AddFoto" class="container text-center event-grid">
        <div class="row g-0">
        <div class="d-flex justify-content-center ">
            <div class="card" style="width: 18rem;">
            <img src="/img/events/{{ $event->image }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $event->name }}</h5>
                <h5 class="card-title">{{ $event->quantidade_fotos }}</h5>
                <p class="card-text">{{ $event->created_at->format('d-m-Y') }}</p>
                <input type="file" id="foto" name="foto" class="form-control-file">
                <input type="submit" class="btn btn-primary" value="Enviar Imagens">
            </form>
        </div>
    </div>
</div>

