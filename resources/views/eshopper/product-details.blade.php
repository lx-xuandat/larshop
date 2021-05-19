@extends('eshopper.master')

@section('title', 'Product Details')

@section('stylesheets')
    <link href="/eshopper/css/bootstrap.min.css" rel="stylesheet">
    <link href="/eshopper/css/font-awesome.min.css" rel="stylesheet">
    <link href="/eshopper/css/prettyPhoto.css" rel="stylesheet">
    <link href="/eshopper/css/price-range.css" rel="stylesheet">
    <link href="/eshopper/css/animate.css" rel="stylesheet">
    <link href="/eshopper/css/main.css" rel="stylesheet">
    <link href="/eshopper/css/responsive.css" rel="stylesheet">
@endsection

@section('product-details')
    <div class="product-details">
        <!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="/eshopper/images/product-details/1.jpg" alt="" />
                <h3>ZOOM</h3>
            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <a href=""><img src="/eshopper/images/product-details/similar1.jpg" alt=""></a>
                        <a href=""><img src="/eshopper/images/product-details/similar2.jpg" alt=""></a>
                        <a href=""><img src="/eshopper/images/product-details/similar3.jpg" alt=""></a>
                    </div>
                    <div class="item">
                        <a href=""><img src="/eshopper/images/product-details/similar1.jpg" alt=""></a>
                        <a href=""><img src="/eshopper/images/product-details/similar2.jpg" alt=""></a>
                        <a href=""><img src="/eshopper/images/product-details/similar3.jpg" alt=""></a>
                    </div>
                    <div class="item">
                        <a href=""><img src="/eshopper/images/product-details/similar1.jpg" alt=""></a>
                        <a href=""><img src="/eshopper/images/product-details/similar2.jpg" alt=""></a>
                        <a href=""><img src="/eshopper/images/product-details/similar3.jpg" alt=""></a>
                    </div>

                </div>

                <!-- Controls -->
                <a class="left item-control" href="#similar-product" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right item-control" href="#similar-product" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information">
                <!--/product-information-->
                <img src="/eshopper/images/product-details/new.jpg" class="newarrival" alt="" />
                <h2>Anne Klein Sleeveless Colorblock Scuba</h2>
                <p>Web ID: 1089772</p>
                <img src="/eshopper/images/product-details/rating.png" alt="" />
                <span>
                    <span>US $59</span>
                    <label>Quantity:</label>
                    <input type="text" value="3" />
                    <button type="button" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Add to cart
                    </button>
                </span>
                <p><b>Availability:</b> In Stock</p>
                <p><b>Condition:</b> New</p>
                <p><b>Brand:</b> E-SHOPPER</p>
                <a href=""><img src="/eshopper/images/product-details/share.png" class="share img-responsive" alt="" /></a>
            </div>
            <!--/product-information-->
        </div>
    </div>
    <!--/product-details-->
@endsection

@section('category-tab')
    @include('eshopper.inc.shop-details-tab')
    <!--/category-tab-->
@endsection

@section('recommended_items')
    @include('eshopper.inc.recommended_items')
    <!--/recommended_items-->
@endsection

@section('scripts')
    <script src="/eshopper/js/jquery.js"></script>
    <script src="/eshopper/js/price-range.js"></script>
    <script src="/eshopper/js/jquery.scrollUp.min.js"></script>
    <script src="/eshopper/js/bootstrap.min.js"></script>
    <script src="/eshopper/js/jquery.prettyPhoto.js"></script>
    <script src="/eshopper/js/main.js"></script>
@endsection
