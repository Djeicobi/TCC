@extends('layouts.main')

@section('title', 'Eventos')

@section('content')

<!-- Cards -->

    <div class="container text-center event-grid">
        <div class="row g-0">
          <div class="col d-flex justify-content-center col-md-4">
            <div class="card" style="width: 18rem;">
              <img src="/img/events/{{ '$event->image' }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Misiones 2022</h5>
                <p class="card-text">12/10/2022</p>
                <a href="#" class="btn btn-primary stretched-link">Ver Evento</a>
              </div>
            </div>
          </div>
          <div class="col d-flex justify-content-center col-md-4">
            <div class="card" style="width: 18rem;">
              <img src="\img\bg6.jpeg" class="card-img-top" alt="...">
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
              <img src="\img\bg6.jpeg" class="card-img-top" alt="...">
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
