@extends('layouts.pages')

@section('title', 'Eventos')

@section('content')

<!-- Cards -->

    <div class="container text-center event-grid">
        <div class="row g-0">
            @if(isset($events) && count($events) > 0)
            @foreach ($events as $event)
          <div class="col d-flex justify-content-center col-md-4">
            <div class="card" style="width: 18rem;">
              <img src="/img/events/{{ $event->image }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{ $event->name }}</h5>
                <p class="card-text">{{ $event->created_at->format('d-m-Y') }}</p>
                <a href="/events/show/{{ $event->id }}" class="btn btn-primary stretched-link">Ver Evento</a>
              </div>
            </div>
          </div>
          @endforeach
          @endif
          </div>
        </div>

@endsection
