@extends('layouts.frontend.app')

@section('title','login')

@push('css')
    <link href="{{asset('assets/frontend/home/styles.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/home/responsive.css')}}" rel="stylesheet">


    {{--    <link rel="stylesheet" href="model/css/bootstrap.css">--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="model/css/style2.css">
    <style>

        .float-right {
            float: left;
            float: right;
        }
    </style>
@endpush


@section('content')


    <section class="blog-area section">
        <div class="container">

            <div class="row">
                @foreach($product as $value)
                    <div class="col-lg-3 col-md-6">
                        <div class="card h-100 ">

                            <div class="single-post post-style-1">

                                <div class="blog-image getdata" data-toggle="modal"

                                     data-id="{{ $value->id }}"
                                     data-product_name="{{ $value->product_name }}"
                                     data-product_description="{{ $value->product_description }}"
                                     data-regular_price="{{ $value->regular_price }}"
                                     data-selling_price="{{ $value->selling_price }}"
                                     data-image="{{ $value->image}}"
                                     data-card_url="{{ $value->card_url}}"
                                     data-status="{{ $value->status }}"


                                     data-target="#myModal"><img style="width: 100%; height: 204px;"
                                                                 src="{{ url('uploads/product/' . $value->image) }}"
                                                                 alt="Image not found"></div>
                                <div class="blog-info">
                                    <p class="title " style="text-align: left; padding: 20px 30px 5px;"><a
                                            href="#"><b>{{$value->product_name}}
                                            </b></a></p>
                                    <ul class="post-footer" style="padding: 20px 30px 9px;">
                                        <p style="text-align: left">Price :
                                            <del style="padding-left:4%;">${{$value->regular_price}}</del>
                                            ${{$value->selling_price}} </p>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->

                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endforeach

            </div><!-- row -->

            {{--            <a class="load-more-btn" href="#"><b>LOAD MORE</b></a>--}}
        </div>
    </section>

    <div class="container">

        <div class="modal fade modal-xl" id="myModal" role="dialog">
            <form action="{{ url('payment/store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content" style="width: 100%;">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title modal-head" id="product_name"></h4>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 pro-section">
                                    <div class="row">
                                        <div class="pro-img">
                                            <img id="img" src="model/img/monitor.png" class="" alt="monitor">
                                        </div>
                                    </div>
                                    <div class="pro-details">
                                        <h4>Price: $<span id=""><strong id="regular_price"></strong></span> $<strong
                                                id="selling_price"></strong></h4>
                                        <h5>Details:</h5>
                                        {{--                                    <p id="product_description">Model: Dell SE2417HG Type LED-backlist LCD monitor Panel Type TN Resolution Full HD 1920 x 1080 Brightness 300 cd/m</p>--}}
                                        <p id="product_description"></p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 shipping-info">

                                    <div class="shipping-head">
                                        <h3>Delivery address</h3>
                                    </div>


                                    <div class="row shipping-details">

                                        <div class="col-md-6 col-lg-6">

                                            <div class="form-group input-field">
                                                <label for="email">Full Name</label>
                                                <input required type="text" class="form-control" id="email"
                                                       placeholder="Card Holder Name" name="name">
                                            </div>
                                            <div class="form-group input-field">
                                                <label for="pwd">Address Line 1</label>
                                                <input required type="text" class="form-control" id="pwd"
                                                       placeholder="Enter Your Address 1 " name="address_line_1">
                                            </div>
                                            <div class="form-group input-field">
                                                <label for="pwd">Country</label>
                                                <input required type="text" class="form-control" id="pwd"
                                                       placeholder="Enter Your Country " name="country">
                                            </div>
                                            <div class="form-group input-field">
                                                <label for="pwd">City</label>
                                                <input required type="text" class="form-control" id="pwd"
                                                       placeholder="Enter Your City " name="city">
                                            </div>
                                            <div class="form-group select-box">
                                                <label for="pwd">Pay by:</label>
                                                <input required type="radio" name="optradio" checked value="Card"> Card
                                                <input type="radio" name="optradio" checked value="Paypal"> Paypal
                                            </div>
                                            <div class="checkbox">
                                                <label><input required type="checkbox"> I read and aggred site <span
                                                        class="terms">terms of use</span></label>
                                            </div>
                                            {{--                                            <button type="" class="button" id="show">Buy</button>--}}
                                            <button type="submit" href="" id="url" class="btn btn-danger">Bye</button>

                                        </div>

                                        <div class="col-md-6 col-lg-6">

                                            <div class="form-group input-field">
                                                <label for="email">Email</label>
                                                <input required type="text" name="email" class="form-control" id="email"
                                                       placeholder="Your Valid E-mail Address">
                                            </div>

                                            <input required name="item_price" id="item_price" class="form-control"
                                                   type="hidden"></input>
                                            <input required name="card_url" id="card_url" value="" class="form-control"
                                                   type="hidden"></input>

                                            <div class="form-group input-field">
                                                <label for="pwd">Address Line 2</label>
                                                <input required type="text" class="form-control" id="pwd"
                                                       placeholder="Enter Your Address 2 " name="address_line_2">
                                            </div>
                                            <div class="form-group input-field">
                                                <label for="pwd">State</label>
                                                <input required type="text" class="form-control" id="pwd"
                                                       placeholder="Enter Your State">
                                            </div>
                                            <div class="form-group input-field">
                                                <label for="pwd">Zip</label>
                                                <input required type="text" class="form-control" id="pwd"
                                                       placeholder="Enter Your Zip" name="zip">
                                            </div>


                                        </div>
                                    </div>

                                </div>


                            </div>


                        </div>

                        <!-- <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div> -->
                    </div>


                </div>
            </form>
        </div>

    </div>
@endsection
@push('js')
    <script src="{{asset('assets/frontend/js/swiper.js')}}"></script>

    <script>
        $(document).ready(function () {
            $(".getdata").click(function () {
                // alert('atik');
                var id = $(this).data('id');
                var product_name = $(this).data('product_name');
                // console.log(id);
                // alert(product_name);
                var product_description = $(this).data('product_description');
                var regular_price = $(this).data('regular_price');
                var selling_price = $(this).data('selling_price');
                var image = $(this).data('image');
                var card_url = $(this).data('card_url');
                var path = 'uploads/product/';
                var abc = path + image;
                // alert(abc);
                // alert(image);

                var status = $(this).data('status');
                if (status == 1) {
                    $('#publish').prop('checked', true)
                } else {

                }

                $("#id").val(id);
                $("#product_name").text(product_name);
                $("#product_description").text(product_description);

                $("#img").attr('src', abc);
                $("#url").attr('href', card_url);
                $("#card_url").val(card_url);

                $("#regular_price").text(regular_price);
                $("#selling_price").text(selling_price);
                $("#item_price").val(selling_price);

                // $("#status").val(status);

            });
        });


    </script>

@endpush


