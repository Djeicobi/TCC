@extends('layouts.pages')

@section('title', 'Seu Carrinho')

@section('content')

<div class="container text-center event-grid">
<div class="container">
    <h2>Carrinho de Compras</h2>

    @if(empty($cart))
        <p>Seu carrinho está vazio.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Preço</th>
                    <th>Evento</th>
                    <th></th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalQuantity = 0;
                    $totalPrice = 0;
                @endphp
                @foreach($cart as $item)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/album_' . $item['event_id'] . '/' . $item['foto']) }}" alt="Foto" style="width: 100px;">
                        </td>
                        <td>R$ {{ number_format($item['photo_price'], 2, ',', '.') }}</td>
                        <td>{{ $item['event_id'] }}</td>
                        <td></td>
                        <td>
                            <form action="{{ route('cart.remove', $item['id_photo']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remover</button>
                            </form>
                        </td>
                    </tr>

                    @php
                        // Atualiza os totais
                        $totalQuantity += $item['quantity'];
                        $totalPrice += $item['photo_price'] * $item['quantity'];
                    @endphp
                @endforeach
            </tbody>
        </table>

         <div class="row">
            <div class="col-md-6 text-left">
                <h4>Total de Fotos: </strong>{{ $totalQuantity }}</h4>
            </div>

            <div class="col-md-6 text-right">
                <h3>Preço Total: </strong>R$ {{ number_format($totalPrice, 2, ',', '.') }}</h3>
            </div>

            <div class="text-center">
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Finalizar Compra</button>
                </form>
            </div>

        </div>
    @endif
</div>
</div>
@endsection

