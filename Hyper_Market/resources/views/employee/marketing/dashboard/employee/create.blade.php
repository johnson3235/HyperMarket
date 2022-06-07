@extends('layouts.parent')
@section('title', 'Create Emplyee')

@section('content')
    {{-- <div class="col-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div> --}}
    @include('includes.response-messages')
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Employee</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ route('dashboard.employees.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-6">
                            <label for="name_en">Name En</label>
                            <input type="text" name="name_en" class="form-control @error('name_en') is-invalid @enderror"
                                id="name_en" value="{{ old('name_en') }}">
                            @error('name_en')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="name_ar">Name Ar</label>
                            <input type="text" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror"
                                id="name_ar"  value="{{ old('name_ar') }}">
                            @error('name_ar')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6">
                            <label for="email">email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="email"  value="{{ old('email') }}">
                            @error('email')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="password">password</label>
                            <input type="text" name="password" class="form-control @error('password') is-invalid @enderror"
                                id="password"  value="{{ old('password') }}">
                            @error('password')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-4">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                id="phone"  value="{{ old('phone') }}">
                            @error('phone')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="salary">Salary</label>
                            <input type="number" step="any" name="salary" class="form-control @error('salary') is-invalid @enderror"
                                id="salary"  value="{{ old('salary') }}">
                            @error('salary')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="Type">Type</label>
                            <select name="type" class='form-control @error('type') is-invalid @enderror' id="type">
                                <option {{ old('type') === '1' ? 'selected' : '' }} value="1">Marketing</option>
                                <option  {{ old('type') === '0' ? 'selected' : '' }} value="0">Inventory</option>
                            </select>
                            @error('type')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-0 col-12">
                        <label for="">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                id="customFile" name="image">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            @error('image')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary" name="submit" value="index">Create Employee</button>
                    <button type="submit" class="btn btn-outline-dark" name="submit" value="back">Create & New</button>
                </div>
            </form>
        </div>
    </div>
@endsection
