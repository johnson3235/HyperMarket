@extends('user.layout.par')
@section('title', 'Shop')
@section('css')
  <!-- all css here -->
    <link rel="stylesheet" href="{{ url('assets/list/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/list/css/animate.css') }}">
    <link rel="stylesheet" href="{{ url('assets/list/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/list/css/slick.css') }}">
    <link rel="stylesheet" href="{{ url('assets/list/css/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/list/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/list/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('assets/list/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/list/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ url('assets/list/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/list/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/list/css/responsive.css') }}">


@endsection

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

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shop-categories owl-carousel mt-5">
                      @foreach ($categories as $category )

                        <div class="item">
                            <a href="{{ route('user.index') }}">
                                <div class="media d-flex align-items-center justify-content-center">
                                    <span class="d-flex mr-2"><i class="sb-bistro-carrot"></i></span>
                                    <div class="media-body">
                                        <h5>{{ $category->name_en }}</h5>
                                        <p>Freshly Harvested Veggies From Local Growers</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <section id="most-wanted">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Most Wanted</h2>
                        <div class="product-carousel owl-carousel">

                            @foreach ($MostWanted as $product)
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
                                                Until {{date('Y', strtotime($product->created_at));  }}
                                            </span>
                                            <span class="badge badge-primary">
                                                20% OFF
                                            </span>
                                        </div>
                                        <a href="{{ route('user.details',$product->id)}}">
                                        <img src='{{ url("images/products/$product->image") }}'  alt="Card image 2" class="card-img-top" width="304" height="236">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">

                                            <a href="{{ route('user.details',$product->id)}}">{{ $product->name_en }}</a>
                                        </h4>
                                        <div class="card-price">
                                            <span class="discount">Rp. 21200.000</span>
                                            <span class="reguler">{{ $product->price }}</span>
                                        </div>

                                        <a href="{{ route('user.details',$product->id)}}"  class="btn btn-block btn-primary">
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

        <section id="Offers">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Offers</h2>
                        <div class="product-carousel owl-carousel">

                            @foreach ($offers as $offer)
                            <div class="item">
                                <div class="card card-product">
                                    <div class="card-ribbon">
                                        <div class="card-ribbon-container right">
                                            <span class="ribbon ribbon-primary">{{ $offer->title }}</span>
                                        </div>
                                    </div>
                                    <div class="card-badge">
                                        <div class="card-badge-container left">
                                            <span class="badge badge-default">
                                                Until {{date('Y', strtotime($offer->created_at));  }}
                                            </span>
                                            <span class="badge badge-primary">
                                                20% OFF
                                            </span>
                                        </div>
                                        <a href="{{ route('user.details',$offer->product_id)}}">
                                        <img src='{{ url("images/products/$offer->image") }}'  alt="Card image 2" class="card-img-top" width="304" height="236">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">

                                            <a href="{{ route('user.details',$offer->product_id)}}">{{ $offer->name_en }}</a>
                                        </h4>
                                        <div class="card-price">
                                            <span class="discount">{{ $offer->price }}</span>
                                            <span class="reguler">{{ $offer->price_after_discount }}</span>
                                        </div>

                                        <a href="{{ route('user.details',$offer->product_id)}}"  class="btn btn-block btn-primary">
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

        <div class="shop-page-area ptb-100">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="shop-topbar-wrapper">
                            <div class="shop-topbar-left">
                                <ul class="view-mode">
                                    <li><a href="#product-grid" data-view="product-grid"><i class="fa fa-th"></i></a></li>
                                    <li class="active"><a href="#product-list" data-view="product-list"><i class="fa fa-list-ul"></i></a></li>
                                </ul>
                                <p>Showing 1 - 20 of 30 results  </p>
                            </div>
                            <div class="product-sorting-wrapper">
                                <div class="product-shorting shorting-style">
                                    <label>View:</label>
                                    <select>
                                        <option value=""> 20</option>
                                        <option value=""> 23</option>
                                        <option value=""> 30</option>
                                    </select>
                                </div>
                                <div class="product-show shorting-style">
                                    <label>Sort by:</label>
                                    <select>
                                        <option value="">Default</option>
                                        <option value=""> Name</option>
                                        <option value=""> price</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="grid-list-product-wrapper">
                            <div class="product-list product-view pb-20">
                                <div class="row">

                                    @foreach ($RelatedProduct as $product)
                                    <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="{{ route('user.details',$product->id)}}">
                                                    <img alt="" src='{{ url("images/products/$product->image") }}'  width="304" height="236">
                                                </a>
                                                <span>-30%</span>
                                                <div class="product-action">
                                                    <a class="action-wishlist" href="#" title="Wishlist">
														<i class="ion-android-favorite-outline"></i>
													</a>
													<a class="action-cart" href="#" title="Add To Cart">
														<i class="ion-ios-shuffle-strong"></i>
													</a>
													<a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
														<i class="ion-ios-search-strong"></i>
													</a>
                                                </div>
                                            </div>
                                            <div class="product-content text-left">
												<div class="product-hover-style">
													<div class="product-title">
														<h4>
															<a href="{{ route('user.details',$product->id)}}">{{ $product->name_en }}</a>
														</h4>
													</div>
													<div class="cart-hover">
														<h4><a href="{{ route('user.details',$product->id)}}">+ Add to cart</a></h4>
													</div>
												</div>
												<div class="product-price-wrapper">
													<span>{{ $product->price }} -</span>
													<span class="product-price-old">$120.00 </span>
												</div>
											</div>
                                            <div class="product-list-details">
                                                <h4>
                                                    <a href="{{ route('user.details',$product->id)}}">{{ $product->name_en }}</a>
                                                </h4>
                                                <div class="product-price-wrapper">
                                                    <span>${{ $product->price }}</span>
                                                    <span class="product-price-old">$120.00 </span>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                <div class="shop-list-cart-wishlist">
                                                    <a href="#" title="Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                    <a href="#" title="Add To Cart"><i class="ion-ios-shuffle-strong"></i></a>
                                                    <a href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                            <div class="shop-widget">
                                <h4 class="shop-sidebar-title">Shop By Categories</h4>
                                <div class="shop-catigory">
                                    <ul id="faq">
                                      @foreach ($sub_categories as $category)
                                        <li> <a href="{{ route('user.shoplist',$category->id)}}">{{ $category->name_en }}</a> </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
@section('js')
<script src="{{ url('assets/list/js/vendor/modernizr-2.8.3.min.js') }}"></script>
<script src="{{ url('assets/list/js/vendor/jquery-1.12.0.min.js') }}"></script>
<script src="{{ url('assets/list/js/popper.js') }}"></script>
<script src="{{ url('assets/list/js/bootstrap.min.js') }}"></script>
<script src="{{ url('assets/list/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ url('assets/list/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ url('assets/list/js/ajax-mail.js') }}"></script>
<script src="{{ url('assets/list/js/owl.carousel.min.js') }}"></script>
<script src="{{ url('assets/list/js/plugins.js') }}"></script>
<script src="{{ url('assets/list/js/main.js') }}"></script>


@endsection
