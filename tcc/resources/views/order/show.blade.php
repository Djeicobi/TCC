@extends('layouts.pages')

@section('title', 'Detalhes do Pedido')

@section('content')
<div class="container event-grid">
    <div class="container">
    <div class="row g-0">
        <h2>Detalhes do Pedido #{{ $order->id }}</h2>

        <p>Status: {{ $order->status }}</p>
        <p>Total: R$ {{ number_format($order->total_price, 2, ',', '.') }}</p>

        <h4>Fotos no Pedido:</h4>
        @foreach($photosGroupedByEvent as $event_id => $groupedPhotos)
            @foreach($groupedPhotos as $photo)
            <div class="col d-flex justify-content-center col-md-4">
                <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/album_' . $photo->event_id . '/' . $photo->foto) }}" alt="Foto" style="width: 300px;">
            </div>
        </div>
            @endforeach
        @endforeach
    </div>
</div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-center mx-auto">
        <form action="{{ route('order.cancel', $order->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Cancelar Compra</button>
        </form>
        <form action="#" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Efetuar Pagamento</button>
        </form>
    </div>
</div>
@endsection
