@extends('user.layout.par')
@section('title', 'Checkout')


@section('banner')
        <div class="banner">
            <?php $path = "url('/assets/img/bg-header.jpg')"; ?>
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: {{ $path }};">
                <div class="container">
                    <h1 class="pt-5">
                        Checkout
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>
@endsection
@section('con')
        <section id="checkout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-7">
                        <h5 class="mb-3">BILLING DETAILS</h5>
                        <!-- Bill Detail of the Page -->
                        <form action="#" class="bill-detail">
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col">

                                        <input class="form-control" disabled placeholder="Name" type="text"  value="{{ $user->name  }}">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" disabled placeholder="Address">{{ $address->street." Street ".$address->buliding." build ".$address->floor." floor ".$address->flat." flat" }}</textarea>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" disabled placeholder="Town / City" type="text" value="{{ $address->name_en }}">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" disabled placeholder="State / Region" type="text" value="{{ $address->name_region_en }}">
                                </div>

                                <div class="form-group row">
                                    <div class="col">
                                        <input class="form-control"disabled placeholder="Email Address" type="email" value="{{ $user->email }}">
                                    </div>
                                    <div class="col">
                                        <input class="form-control"disabled placeholder="Phone Number" type="tel" value="{{ $user->phone }}">
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <p style="font-weight: bold;font-size:20px; color:#E91E63;">IF ship to another Address change it From profile<br>Thank You !</p>

                                </div>
                            </fieldset>
                        </form>
                        <!-- Bill Detail of the Page end -->
                    </div>
                    <div class="col-xs-12 col-sm-5">
                        <div class="holder">
                            <h5 class="mb-3">YOUR ORDER</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Products</th>
                                            <th>Price_one</th>
                                            <th class="text-right">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <?php $total=0;?>
                                    <tbody>
                                        @foreach ( $carts as $cart)
<?php $price=$cart->quantity*$cart->price;
$total=$total+$price;
?>
                                        <tr>
                                            <td>
                                                {{ $cart->name_en }} x{{ $cart->quantity }}
                                            </td>
                                            <td>
                                                {{ $cart->price }}
                                            </td>
                                            <td class="text-right">
                                                $ {{ $price }}
                                            </td>
                                        </tr>


                                        @endforeach
                                    </tbody>
                                    <tfooter>
                                        <?php $shipping =20;?>
                                        <tr>
                                            <td>
                                                <strong>Cart Subtotal</strong>
                                            </td>
                                            <td></td>
                                            <td class="text-right">
                                                 $ {{ $total }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Shipping</strong>
                                            </td>
                                            <td></td>
                                            <td class="text-right">
                                                $ {{ $shipping }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>ORDER TOTAL</strong>
                                            </td>
                                            <td></td>
                                            <td class="text-right">
                                                <strong>$ {{ $total+$shipping }}</strong>
                                            </td>
                                        </tr>
                                    </tfooter>
                                </table>
                            </div>

                            <h5 class="mb-3">PAYMENT METHODS</h5>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    Direct Bank Transfer
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                    Credit Card
                                </label>
                            </div>
                        </div>
                        <p class="text-right mt-3">
                            <input checked="" type="checkbox"> I’ve read &amp; accept the <a href="#">terms &amp; conditions</a>
                        </p>
                        <form method="post" action="{{ route('user.order.makeOrder') }}">
                            @csrf
                            <?php $id = Auth::user()->id;?>
                            <div style="display: none;">
                            <input name="id" value="{{ $id }}">
                            </div>
                            <button type="submit" class="btn btn-outline-primary" name="submit" value="index">PROCEED TO CHECKOUT <i class="fa fa-check"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @endsection
