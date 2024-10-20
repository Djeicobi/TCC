<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Photo;
use App\Models\Event;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('carrinho');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
    public function addToCart(Request $request, $photo, $event)
    {
        // Encontra a foto pelo ID
        $photo = Photo::findOrFail($photo);
        $event = Event::findOrFail($event);

        // Recupera o carrinho da sessão ou cria um novo array vazio
        $cart = session()->get('cart', []);

        // Adiciona a foto ao carrinho
        $cart[$photo->id_photo] = [
            'id_photo' => $photo->id_photo,
            'event_id' => $event->id,
            'photo_price' => $event->photo_price,
            'quantity' => 1, // Inicialmente 1
            'foto' => $photo->foto,
        ];

        // Atualiza o carrinho na sessão
        session()->put('cart', $cart);

        // Redireciona de volta com uma mensagem de sucesso
        return back()->with('success', 'Foto adicionada ao carrinho com sucesso!');
    }
    public function viewCart()
{
    // Recupera o carrinho da sessão
    $cart = session()->get('cart', []);

    // Exibe a view com o conteúdo do carrinho
    return view('cart.view', compact('cart'));
}
public function removeFromCart($photo)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$photo])) {
        unset($cart[$photo]);
        session()->put('cart', $cart);
    }

    return back()->with('success', 'Foto removida do carrinho com sucesso!');
}
public function checkout()
{
    // Obtenha o carrinho da sessão
    $cart = session()->get('cart', []);

    // Verifique se o carrinho não está vazio
    if (empty($cart)) {
        return back()->with('error', 'Seu carrinho está vazio.');
    }

    // Calcular o preço total
    $totalPrice = array_sum(array_column($cart, 'photo_price'));

    // Obtenha os IDs das fotos no carrinho
    $photoIds = array_column($cart, 'id_photo');

    // Crie um novo pedido
    $order = Order::create([
        'user_id' => auth()->id(), // Supondo que o usuário esteja logado
        'photo_ids' => $photoIds,
        'total_price' => $totalPrice,
        'status' => 'Pendente',
    ]);

    // Limpe o carrinho da sessão
    session()->forget('cart');

    // Retornar uma mensagem de sucesso
    return redirect()->route('orders.show', $order->id)->with('success', 'Pedido realizado com sucesso!');
}

}
