@extends('layouts.parent')
@section('title', 'Edit admin')

@section('content')

    @include('includes.response-messages')
    <div class="col-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit admin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ route('dashboard.admins.update',$admin->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- <input type="hidden" name="id" value="{{ $admin->id }}"> --}}
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-4">
                            <label for="name_en">Name En</label>
                            <input type="text" name="name_en" class="form-control @error('name_en') is-invalid @enderror"
                                id="name_en" value="{{$admin->name_en}}">
                            @error('name_en')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="col-4">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                id="phone"  value="{{$admin->phone }}">
                            @error('phone')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>


                    </div>
                    <div class="form-row">
                        <div class="col-6">
                            <label for="email">email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="email"  value="{{ $admin->email }}">
                            @error('email')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label for="created_at">created at</label>
                            <input type="text" name="created_at" class="form-control @error('created_at') is-invalid @enderror"
                                id="created_at"  value="{{ $admin->created_at }}" disabled>
                            @error('created_at')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>


                    </div>
                    <div class="form-row">
                        <div class="col-6">
                            <label for="customFile">Image <br><img src="{{url('/images/admins/'.$admin->image)}}" alt="{{$admin->name_en}}" class="w-50 " style="cursor: pointer"></label>
                            <input type="file" class="d-none"
                                id="customFile" name="image">
                            @error('image')
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
