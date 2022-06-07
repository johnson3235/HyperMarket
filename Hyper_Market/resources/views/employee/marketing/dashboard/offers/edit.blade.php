@extends('employee.marketing.layouts.parent')
@section('title', 'Edit offer')

@section('content')
    @include('includes.response-messages')
    <div class="col-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit offer</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{route('EmpMarketing.offers.update',$offer->offer_id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="form-row">
                        <div class="col-4">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                id="title" value="{{ $offer->title }}">
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
                                    <option {{ $offer->product_id == $product->id ? 'selected' : '' }} value="{{ $product->id }}">{{ $product->name_en }}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="discount">Discount</label>
                            <input type="number" step="any" name="discount" class="form-control @error('discount') is-invalid @enderror"
                                id="discount"  value="{{ $offer->discount }}">
                            @error('discount')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-4">
                            <label for="Type">Type</label>
                            <select name="discount_type" class='form-control @error('discount_type') is-invalid @enderror' id="type">
                                <option {{ $offer->discount_type === '1' ? 'selected' : '' }} value="1">Precentage</option>
                                <option  {{ $offer->discount_type === '0' ? 'selected' : '' }} value="0">Numeric</option>
                            </select>
                            @error('discount_type')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="start_date">start_date</label>
                            <input type="text"  name="start_date" class="form-control @error('start_date') is-invalid @enderror"
                                id="start_date"  value="{{ $offer->start_date }}">
                            @error('start_date')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="end_date">end_date</label>
                            <input type="text"  name="end_date" class="form-control @error('end_date') is-invalid @enderror"
                                id="end_date"  value="{{ $offer->end_date }}">
                            @error('end_date')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                  

                </div>


                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-warning" name="submit" value="index">Update Product</button>

                </div>
            </form>
        </div>
    </div>

@endsection
{{-- // API
// JSON
// Authentication Token --}}
