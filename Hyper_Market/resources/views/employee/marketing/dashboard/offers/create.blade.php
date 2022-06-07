@extends('employee.marketing.layouts.parent')
@section('title', 'Create Offer')

@section('content')

    @include('includes.response-messages')
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Offer</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ route('EmpMarketing.offers.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-4">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                id="title" value="{{ old('title') }}">
                            @error('title')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="product_id">products</label>
                            <select name="product_id" class='form-control @error('product_id') is-invalid @enderror'
                                id="product_id">
                                <option disabled selected>Choose product</option>
                                @foreach ($products as $product)
                                    <option {{ old('product_id') == $product->id ? 'selected' : '' }} value="{{ $product->id }}">{{ $product->name_en }}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="discount">Discount</label>
                            <input type="number" step="any" name="discount" class="form-control @error('discount') is-invalid @enderror"
                                id="discount"  value="{{ old('discount') }}">
                            @error('discount')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-4">
                            <label for="Type">Type</label>
                            <select name="discount_type" class='form-control @error('discount_type') is-invalid @enderror' id="type">
                                <option {{ old('discount_type') === '1' ? 'selected' : '' }} value="1">Precentage</option>
                                <option  {{ old('discount_type') === '0' ? 'selected' : '' }} value="0">Numeric</option>
                            </select>
                            @error('discount_type')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="start_date">start_date</label>
                            <input type="date"  name="start_date" class="form-control @error('start_date') is-invalid @enderror"
                                id="start_date"  value="{{ old('start_date') }}">
                            @error('start_date')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="end_date">end_date</label>
                            <input type="date"  name="end_date" class="form-control @error('end_date') is-invalid @enderror"
                                id="end_date"  value="{{ old('end_date') }}">
                            @error('end_date')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary" name="submit" value="index">Create Offer</button>

                </div>
            </form>
        </div>
    </div>
@endsection
