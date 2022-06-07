@extends('layouts.parent')
@section('title', 'Edit Employee')

@section('content')
    @include('includes.response-messages')
    <div class="col-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Employee</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ route('dashboard.employees.update',$employee->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- <input type="hidden" name="id" value="{{ $employee->id }}"> --}}
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-6">
                            <label for="name_en">Name En</label>
                            <input type="text" name="name_en" class="form-control @error('name_en') is-invalid @enderror"
                                id="name_en" value="{{$employee->name_en }}">
                            @error('name_en')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="name_ar">Name Ar</label>
                            <input type="text" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror"
                                id="name_ar"  value="{{ $employee->name_ar }}">
                            @error('name_ar')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6">
                            <label for="email">email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="email"  value="{{ $employee->email }}">
                            @error('email')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                id="phone"  value="{{$employee->phone }}">
                            @error('phone')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="col-6">
                            <label for="salary">Salary</label>
                            <input type="number" step="any" name="salary" class="form-control @error('salary') is-invalid @enderror"
                                id="salary"  value="{{$employee->salary }}">
                            @error('salary')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="Type">Type</label>
                            <select name="type" class='form-control @error('type') is-invalid @enderror' id="type">
                                <option {{$employee->type =='0' ? 'selected' : '' }} value="0">Marketing</option>
                                <option  {{ $employee->type == '1' ? 'selected' : '' }} value="1">Inventory</option>
                            </select>
                            @error('type')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6">
                            <label for="customFile">Image <br><img src="{{url('/images/employees/'.$employee->image)}}" alt="{{$employee->name_en}}" class="w-50 " style="cursor: pointer"></label>
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
