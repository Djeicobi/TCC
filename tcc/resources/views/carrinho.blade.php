@extends('layouts.main')

@section('title', 'Carrinho')

@section('content')

<!-- Carrinho -->
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row w-100">
            <div class="col-lg-12 col-md-12 col-12">
            <h3 class="display-5 mb-2 text-center">Carrinho</h3>
            <p class="mb-5 text-center">
            <i class="text-info font-weight-bold">3</i> Fotos do seu Carrinho</p>
            <table id="shoppingCart" class="table table-condensed table-responsive">
            <thead>
            <tr>
            <th style="width:60%">Produtos</th>
            <th style="width:12%">Preço</th>
            <th style="width:16%"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td data-th="Produto">
            <div class="row">
            <div class="col-md-3 text-left">
            <img src="/img/bg5.jpeg" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
            </div>
            <div class="col-md-9 text-left mt-sm-2">
            <h4>img_0163</h4>
            <p class="font-weight-light">Missiones 2022</p>
            </div>
            </div>
            </td>
            <td data-th="Price">R$15,00</td>
            <td class="actions" data-th="">
            <div class="text-right">
            <button class="btn btn-white border-secondary bg-white btn-md mb-2">
            <i class="fa-regular fa-trash"></i>
            </button>
            </div>
            </td>
            </tr>
            <tr>
            <td data-th="Product">
            <div class="row">
            <div class="col-md-3 text-left">
            <img src="/img/bg3.jpeg" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
            </div>
            <div class="col-md-9 text-left mt-sm-2">
            <h4>img_0158</h4>
            <p class="font-weight-light">Missiones 2022</p>
            </div>
            </div>
            </td>
            <td data-th="Price">R$15,00</td>
            <td class="actions" data-th="">
            <div class="text-right">
            <button class="btn btn-white border-secondary bg-white btn-md mb-2">
            <i class="fa-regular fa-trash"></i>
            </button>
            </div>
            </td>
            </tr>
            <tr>
            <td data-th="Product">
            <div class="row">
            <div class="col-md-3 text-left">
            <img src="/img/bg7.jpeg" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
            </div>
            <div class="col-md-9 text-left mt-sm-2">
            <h4>img_0154</h4>
            <p class="font-weight-light">Missiones 2022</p>
            </div>
            </div>
            </td>
            <td data-th="Price">R$15,00</td>
            <td class="actions" data-th="">
            <div class="text-right">
            <button class="btn btn-white border-secondary bg-white btn-md mb-2">
            <i class="fa-regular fa-trash"></i>
            </button>
            </div>
            </td>
            </tr>
            </tbody>
            </table>
            <div class="float-right text-right">
            <h4>Valor Total:</h4>
            <h1>R$45,00</h1>
            </div>
            </div>
            </div>
            <div class="row mt-4 d-flex align-items-center">
            <div class="col-sm-6 order-md-2 text-right">
            <a href="/" class="btn btn-primary mb-4 btn-lg pl-5 pr-5 float-end">Confirmar Compra</a>
            </div>
            <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
            <a href="/">
            <i class="fas fa-arrow-left mr-2"></i> Continue Comprando</a>
            </div>
        </div>
    </div>
</section>

    <script src="https://kit.fontawesome.com/0ce5e1ed06.js" crossorigin="anonymous"></script>

@endsection
