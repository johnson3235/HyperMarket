@extends('user.layout.par')
@section('title', 'Shop')


@section('banner')
<?php $path = "url('/assets/img/bg-header.jpg')"; ?>
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: {{ $path }};">
                <div class="container">
                    <h1 class="pt-5" style="color: white;">
                        Order Details
                    </h1>
                    <p class="lead" style="color: white;">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>
@endsection
        @section('con')
        <?php $id = Auth::user()->id; ?>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>User Name </th>
                        <th>Price (EGP)</th>
                        <th>quantity</th>
                        <th>Image</th>
                        <th>Order_Date</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($order_products as $order)
                        <tr>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->name_en }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td><img src='{{ url("/images/products/$order->image") }}'  alt="Product Image" class="img-size-50"></td>
                            <td>{{ $order->deliverd_data }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <a href="{{ route('user.order.listes',$id) }}"><button class="float-right btn btn-outline-primary"> Back </button></a>
        </div>
    @endsection

