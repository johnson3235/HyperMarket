@extends('user.layout.par')
@section('title', 'Shop')

@section('content')
    @include('includes.response-messages')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
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

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection

