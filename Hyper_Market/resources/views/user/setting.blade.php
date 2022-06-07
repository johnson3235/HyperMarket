@extends('user.layout.par')
@section('title', 'Profile')

@section('banner')
        <div class="banner">
            <?php $path = "url('/assets/img/bg-header.jpg')"; ?>
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: {{ $path }};">
                <div class="container">
                    <h1 class="pt-5">
                        Settings
                    </h1>
                    <p class="lead">
                        Update Your Account Info
                    </p>
                </div>
            </div>
        </div>
    @endsection
        @section('con')
        @include('includes.response-messages')
        <section id="checkout">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xs-12 col-sm-6">
                        <h5 class="mb-3">ACCOUNT DETAILS</h5>
                        <!-- Bill Detail of the Page -->
                        <?php $id=Auth::user()->id; ?>
                        <form method="post" action="{{ route('user.updates',$id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        {{-- <input type="hidden" name="id" value="{{ $id }}"> --}}
                            <fieldset>
                                <div class="col-12 my-5">
                                    <div class="row mb-5">
                                        <div class="col-4 offset-4">
                                            <label for="image" style="cursor: pointer;">
                                                <?php $image=Auth::user()->image;?>
                                                <img src='{{ url("images/users/$image")}}'   alt="" class="w-100 rounded-circle">
                                            </label>
                                            <input type="file" name="image" id="image" class="d-none">
                                            @error('image')
                                            <p class="text-danger"> {{ $message }} </p>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <input class="form-control" placeholder="Name" name="name" type="text" value="{{ $user->name }}">
                                        @error('name')
                                        <p class="text-danger"> {{ $message }} </p>
                                    @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Address" disabled>{{ $address->street." Street ".$address->buliding." build ".$address->floor." floor ".$address->flat." flat" }}</textarea>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="City" type="text" value="{{ $address->name_en }}" disabled>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="region" type="text" value="{{ $address->name_region_en }}" disabled>
                                </div>

                                <div class="form-group row">
                                    <div class="col">
                                        <input class="form-control" placeholder="Email Address" type="email" name="email" value="{{ $user->email }}" disabled >

                                    </div>
                                    <div class="col">
                                        <input class="form-control" placeholder="Phone Number" type="tel" name="phone" value="{{ $user->phone }}">
                                        @error('phone')
                                            <p class="text-danger"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-outline-primary" name="submit" value="index">UPDATE</a>
                                    <div class="clearfix">
                                </div>
                            </fieldset>
                        </form>
                        @if (Route::has('password.request'))
                        <a class="float-right btn btn-outline-primary" href="{{ route('user.resets',$user->id) }}">
                            {{ __('Change Password') }}
                        </a>
                    @endif
                        <!-- Bill Detail of the Page end -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
