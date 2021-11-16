@php
use App\Models\Product;
$getProducts = Product::where(['status' => 1])
                ->orderBY('id', 'desc')
                ->get();
@endphp
@extends('layouts.master')
@section('content')
    @include('layouts.front_layout.slider')

    <!-- discount -->
    <div class="container">
        <div id="myCarousel" class="carousel slide banner_Client" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="carousel-caption text">
                            <div class="row">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                                    <div class="img_bg">
                                        <h3>50% DISCOUNT<br> <strong class="black_nolmal">the latest collection</strong>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="img_bg">
                                        <figure><img src="{{ asset('images/front_images/img/discount.jpg') }}" /></figure>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="carousel-caption text">
                            <div class="row">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                                    <div class="img_bg">
                                        <h3>50% DISCOUNT<br> <strong class="black_nolmal">the latest collection</strong>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="img_bg">
                                        <figure><img src="{{ asset('images/front_images/img/discount.jpg') }}" /></figure>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="carousel-caption text">
                            <div class="row">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                                    <div class="img_bg">
                                        <h3>50% DISCOUNT<br> <strong class="black_nolmal">the latest collection</strong>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="img_bg">
                                        <figure><img src="{{ asset('images/front_images/img/discount.jpg') }}" /></figure>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end discount -->
    <!-- trending -->
    <div class="trending">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="title">
                        <h2>Trending <strong class="black">Categories</strong></h2>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margitop">
                    <div class="trending-box">
                        <figure><img src="{{ asset('images/front_images/img/1.jpg') }}" /></figure>
                        <h3>Outdoor</h3>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="trending-box">
                        <figure><img src="{{ asset('images/front_images/img/2.jpg') }}" /></figure>
                        <h3>Living Room</h3>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margitop">
                    <div class="trending-box">
                        <figure><img src="{{ asset('images/front_images/img/3.jpg') }}" /></figure>
                        <h3>Bedroom Lighting</h3>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end trending -->
    
        <!-- our brand -->
        <div class="brand">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title">
                            <h2>Featured <strong class="black">Products</strong></h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        @if (!empty($getProducts))

        <div class="container-fluid">
            <div class="brand-bg">
                <div class="row">

                    @foreach ($getProducts as $product)

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 margintop">
                            <div class="brand-box">
                                <i><img src="{{ asset('images/product_images/medium/' . $product['image']) }}" /></i>

                                <h3><a href="{{ url('/product/' . $product['id']) }}">{{ $product['name'] }}</a>
                                </h3>

                                @if ($product['discount_price'] > 0)
                                    <ins>{{ $product['discount_price'] }} BDT</ins>
                                    <del>{{ $product['price'] }} BDT</del>
                                @else
                                    <ins>{{ $product['price'] }} BDT</ins>
                                @endif
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>

    @endif

    <!-- end our brand -->

@endsection
