@extends('layouts.pages')

@section('title', 'Página do Evento')

@section('content')


<div class="container text-center event-grid">
    <div class="row g-0">
        @foreach($event->photos as $photo)
          <div class="col d-flex justify-content-center col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/album_' . $event->id . '/' . $photo->foto) }}" class="card-img-top" alt="...">
                <!-- Exibe o número da foto -->
                <div class="card-body">
                <p class="card-text">Foto {{ $loop->iteration }}</p>
                <!-- Formulário para adicionar ao carrinho -->
                <form action="{{ route('cart.add', ['photo' => $photo->id_photo, 'event' => $event->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary stretched-link">Adicionar ao Carrinho</button>
                </form>
              </div>
            </div>
          </div>
          @endforeach


@endsection
