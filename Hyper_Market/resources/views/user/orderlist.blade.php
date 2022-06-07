@extends('user.layout.par')
@section('title', 'Shop')


@section('banner')
<?php $path = "url('/assets/img/bg-header.jpg')"; ?>
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: {{ $path }};">
                <div class="container">
                    <h1 class="pt-5" style="color: white;">
                        Shopping Page
                    </h1>
                    <p class="lead" style="color: white;">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>
@endsection
        @section('con')
        @include('includes.response-messages')
        <?php $id = Auth::user()->id; ?>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>User Name </th>
                        <th>Price (EGP)</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->price }}</td>

                            @if ($order->statuses == 0)
                                <td class='text-danger font-weight-bold'> <span class="badge badge-danger">Pending</span> </td>
                                @elseif($order->statuses == 1)
                                <td class='text-warning font-weight-bold'><span class="badge badge-warning">shipping</span></td>
                                @else
                                <td class='text-success font-weight-bold'> <span class="badge badge-success">Delivered</span> </td>
                            @endif

                            <td>
                                <a href="{{ route('user.order.Details', [$id,$order->order_id]) }}"
                                    class="btn btn-outline-success"> Details </a>
                                    @if ($order->statuses == 0)
                                <form action="{{ route('user.order.destroyOrder',[$id,$order->order_id]) }}"
                                    class="d-inline" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-outline-danger"> Cancel </button>
                                </form>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection

