@extends('user.layout.par')
@section('title', 'carts')
@section('banner')
        <div class="banner">
            <?php $path = "url('/assets/img/bg-header.jpg')"; ?>
    <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: {{ $path }};">
                <div class="container">
                    <h1 class="pt-5">
                        Your Cart
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>
@endsection
@section('con')
<?php $id =Auth::user()->id;?>
@include('includes.response-messages')
        <section id="cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="10%"></th>
                                        <th>Products</th>
                                        <th>Price</th>
                                        <th width="15%">Quantity</th>
                                        <th>Subtotal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sum=0; ?>

                                    @foreach ($carts as $cart)
                                   <?php $sum=$sum+ ($cart->quantity * $cart->price);?>
                                    <tr>
                                        <td>
                                            <img src='{{ url("images/products/$cart->image") }}'  width="60">
                                        </td>
                                        <td>
                                            {{ $cart->name_en }}<br>
                                            <small>1000g</small>
                                        </td>
                                        <td>
                                            Rp {{ $cart->price }}
                                        </td>
                                        <td>
                                            <div>
                                                <span>{{ $cart->quantity }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            Rp {{ $cart->quantity * $cart->price }}
                                        </td>
                                        <td>

                                                <a href="{{ route('user.details2',[$cart->product_id,$cart->quantity]) }}">
                                                    <button class="btn btn-outline-success">change </button>
                                                </a>

                                            <form action="{{ route('user.cart.destroy',[$id,$cart->product_id]) }}"
                                                class="d-inline" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a>
                                                    <button class="btn btn-outline-danger"><i class="fa fa-times"></i> </button>
                                                </a>
                                            </form>

                                        </td
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col">
                        <a href="{{ route('user.shop') }}" class="btn btn-default">Continue Shopping</a>
                    </div>
                    <div class="col text-right">
                        <div class="input-group w-50 float-right">
                            <input class="form-control" placeholder="Coupon Code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-default" type="button">Apply</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <h6 class="mt-3">Total: $ {{ $sum }}</h6>
                        <a href="{{ route('user.order.showcheckout',$id) }}" class="btn btn-lg btn-primary">Checkout <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
