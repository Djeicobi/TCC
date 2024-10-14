@extends('layouts.pages')

@section('title', 'Página do Evento')

@section('content')


{{--@if(isset($photo) && count($photo) > 0) --}}

<div class="container text-center event-grid">
    <div class="row g-0">
            {{--@foreach ($photos as $photo)--}}
          <div class="col d-flex justify-content-center col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/app/album_' . $event->id . '/' . $file->getFilename()) }}" class="card-img-top" alt="...">
              <div class="card-body">
                <a href="#" class="btn btn-primary stretched-link">Adicionar ao Carrinho</a>
              </div>
            </div>
          </div>

         {{-- @endforeach
@endif--}}

<nav aria-label="Page navigation example">
<ul class="pagination justify-content-center">
  <li class="page-item">
    <a class="page-link" href="#" aria-label="Previous">
      <span aria-hidden="true">&laquo;</span>
    </a>
  </li>
  <li class="page-item"><a class="page-link" href="#">1</a></li>
  <li class="page-item"><a class="page-link" href="#">2</a></li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
  <li class="page-item">
    <a class="page-link" href="#" aria-label="Next">
      <span aria-hidden="true">&raquo;</span>
    </a>
  </li>
</ul>
</nav>

@endsection
