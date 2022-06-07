@extends('user.layout.par')
@section('title', 'Shop_List')

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
        <div class="banner">
            <?php $path = "url('/assets/img/bg-header.jpg')"; ?>
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: {{ $path }};">
                <div class="container">
                    <h1 class="pt-5 " style="color: white;">
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
                                                <a href="product-details.html">
                                                    <img alt="" src='{{ url("images/products/$product->image") }}'>
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
                                                    <a href="product-details.html">{{ $product->name_en }}</a>
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
                                    {{--  <div class="product-width pro-list-none col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="product-details.html">
                                                    <img alt="" src="assets/img/product/product-6.jpg">
                                                </a>
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
															<a href="product-details.html">Every spice Tea</a>
														</h4>
													</div>
													<div class="cart-hover">
														<h4><a href="product-details.html">+ Add to cart</a></h4>
													</div>
												</div>
												<div class="product-price-wrapper">
													<span>$100.00 -</span>
													<span class="product-price-old">$120.00 </span>
												</div>
											</div>
                                            <div class="product-list-details">
                                                <h4>
                                                    <a href="product-details.html">Every spice Tea</a>
                                                </h4>
                                                <div class="product-price-wrapper">
                                                    <span>$100.00</span>
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
                                    </div>  --}}

                                </div>
                            </div>
                            <div class="pagination-total-pages">
                                <div class="pagination-style">
                                    <ul>
                                        <li><a class="prev-next prev" href="#"><i class="ion-ios-arrow-left"></i> Prev</a></li>
                                        <li><a class="active" href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">...</a></li>
                                        <li><a href="#">10</a></li>
                                        <li><a class="prev-next next" href="#">Next<i class="ion-ios-arrow-right"></i> </a></li>
                                    </ul>
                                </div>
                                <div class="total-pages">
                                    <p>Showing 1 - 20 of 30 results  </p>
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
                                      @foreach ($categories as $category)
                                        <li> <a href="{{ route('user.shoplist',$category->id)}}">{{ $category->name_en }}</a> </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>


                            <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                                <h4 class="shop-sidebar-title">By Color</h4>
                                <div class="sidebar-list-style mt-20">
                                    <ul>
                                        <li><input type="checkbox"><a href="#">Black </a></li>
                                        <li><input type="checkbox"><a href="#">Blue </a></li>
                                        <li><input type="checkbox"><a href="#">Green </a></li>
                                        <li><input type="checkbox"><a href="#">Grey </a></li>
                                        <li><input type="checkbox"><a href="#">Red</a></li>
                                        <li><input type="checkbox"><a href="#">White  </a></li>
                                        <li><input type="checkbox"><a href="#">Yellow   </a></li>
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- Shop Page Area Start -->
        <!-- Footer style Start -->
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
