<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Photo;
use App\Models\Event;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show($id)
{
    $order = Order::findOrFail($id);

    $event = Event::find($id);

    $photoIds = $order->photo_ids;

    $photos = Photo::whereIn('id_photo', $photoIds)->get();

    // Agrupa as fotos por evento
    $photosGroupedByEvent = $photos->groupBy('event_id');

    return view('order.show', compact('order', 'photosGroupedByEvent', 'event'));
}

public function cancelOrder($id)
{
    $order = Order::findOrFail($id);

    $order->status = 'Cancelado';
    $order->save();
    return redirect()->route('cart.view')->with('success', 'Compra cancelada com sucesso.');
}
public function destroy($id)
{
    $order = Order::findOrFail($id);
    $order->delete();

    return redirect()->route('cart.view')->with('success', 'Compra removida com sucesso!');
}

}
