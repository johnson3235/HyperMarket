@extends('user.layout.par')
@section('title', 'Product')

    @section('banner')

        <div class="banner">
            <?php $path = "url('/assets/img/bg-header.jpg')"; ?>
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image:{{$path }};">
                <div class="container">
                    <h1 class="pt-5">
                        {{ $product->name_en }}
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>
        @endsection
        @section('con')
        <?php $id =Auth::user()->id;?>


        <div class="product-detail">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="slider-zoom">
                            <a href='{{ url("/images/products/$product->image") }}'  class="cloud-zoom" rel="transparentImage: 'data:image/gif;base64,R0lGODlhAQABAID/AMDAwAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==', useWrapper: false, showTitle: false, zoomWidth:'400', zoomHeight:'400', adjustY:0, adjustX:10" id="cloudZoom">
                                <img alt="Detail Zoom thumbs image" src='{{ url("/images/products/$product->image") }}'  style="width: 100%;">
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <p>
                            <strong>Overview</strong><br>
                            {{ $product->des_en }}
                        </p>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>
                                    <strong>Price</strong> (/Pack)<br>
                                    <span class="price">Rp {{ $product->price }}</span>
                                    <span class="old-price">Rp 150.000</span>
                                </p>
                            </div>
                            <div class="col-sm-6 text-right">
                                <p>
                                    <span class="stock available">In Stock: {{ $product->quantity }}</span>
                                </p>
                            </div>
                        </div>
                        <p class="mb-1">
                            <strong>Quantity</strong>
                        </p>

                        <form method="post" action="{{ $quantity ? route('user.cart.update') : route('user.cart.StoreCart'); }}">
                            @csrf

                        <div class="row">

                        <div class="col-6" >
                            <input class="vertical-spin @error('quantity') is-invalid @enderror"  type="text" name="quantity"
                            data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" value="{{ $quantity ? $quantity : 0 ; }}" >
                            @error('quantity')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                            <div class="col-6" style="display: none;">
                                <label for="product_id">product_id</label>
                                <input type="text" name="product_id" class="form-control @error('product_id') is-invalid @enderror"
                                    id="name_en" value="{{ $product->id }}">
                                @error('product_id')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                            </div>


                            <div class="col-6" style="display: none;">
                                <label for="user_id">user_id</label>
                                <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror"
                                    id="user_id" value="{{ $id }}">
                                @error('user_id')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                            </div>
                            @error('product_id')
                            <p class="text-danger"> {{ $message }} </p>
                        @enderror
                            @error('user_id')
                            <p class="text-danger"> {{ $message }} </p>
                        @enderror
                        <button class="mt-3 btn btn-primary btn-lg">
                            <i class="fa fa-shopping-basket"></i> Add to Cart
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <section id="related-product">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Related Products</h2>
                        <div class="product-carousel owl-carousel">

@foreach ($RelatedProduct as $productRelated)

                            <div class="item">
                                <div class="card card-product">
                                    <div class="card-ribbon">
                                        <div class="card-ribbon-container right">
                                            <span class="ribbon ribbon-primary">SPECIAL</span>
                                        </div>
                                    </div>
                                    <div class="card-badge">
                                        <div class="card-badge-container left">
                                            <span class="badge badge-default">
                                                Until {{date('Y', strtotime($productRelated->created_at));  }}
                                            </span>
                                            <span class="badge badge-primary">
                                                20% OFF
                                            </span>
                                        </div>
                                        <a href="{{ route('user.details',$productRelated->id)}}">
                                        <img src='{{ url("images/products/$productRelated->image") }}'  alt="Card image 2" class="card-img-top"  width="304" height="236">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="{{ route('user.details',$productRelated->id)}}" >{{ $productRelated->name_en}}</a>
                                        </h4>
                                        <div class="card-price">
                                            <span class="discount">Rp. {{ $productRelated->price }}</span>
                                            <span class="reguler">Rp. 200.000</span>
                                        </div>
                                        <a href="{{ route('user.details',$productRelated->id)}}"  class="btn btn-block btn-primary">
                                            Add to Cart
                                        </a>

                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
