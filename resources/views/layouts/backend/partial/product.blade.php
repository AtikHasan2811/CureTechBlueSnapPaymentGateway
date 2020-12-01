@extends('layouts.backend.app')
@section('title', 'Dashboard')
    @push('css')
        <style>
            * {
                box-sizing: border-box;
            }

            .zoom {
                /*padding: 50px;*/
                /*background-color: green;*/
                transition: transform .2s;
                width: 50px;
                height: 50px;
                /*margin: 0 auto;*/
            }

            .zoom:hover {
                -ms-transform: scale(3.5);
                /* IE 9 */
                -webkit-transform: scale(3.5);
                /* Safari 3-8 */
                transform: scale(3.5);
            }

        </style>
    @endpush
@section('content')
    <div class="container-fluid">
        <div class="section">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                About Table
                            </h2>
                            <div class="col text-right">
                                <a style="width: 200px;" type="button" class="btn btn-outline-info  float-right "
                                    data-toggle="modal" data-target="#exampleModalinsert" value="Add Photo">Add About</a>
                            </div>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                {{--        product_name	product_description	image	regular_price	selling_price	status	created_at	updated_at--}}
                                    <tr>
                                        <th style="width: 5%">#SL</th>
                                        <th style="width: 20%">Photo</th>
                                        <th style="width: 20%">Product Name</th>
                                        <th style="width: 15%">Regular Price</th>
                                        <th style="width: 15%">Selling Price</th>
                                        <th style="width: 5%">Status</th>
                                        <th style="width: 20%" class="text-center">Action
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>
                                                <div class="zoom"><img src="{{ url('uploads/product/' . $value->image) }}"
                                                        style="height: 50px;width: 50px;" alt=""></div>




                                            </td>
                                            <td>{{$value->product_name}}</td>
{{--                                            <td>{{substr($value->product_description,0,200)}}...</td>--}}
                                            <td>{{$value->regular_price}}</td>
                                            <td>{{$value->selling_price}}</td>
                                            <td>
                                                @if ($value->status == true)
                                                    <span class="badge bg-blue">Published</span>
                                                @else
                                                    <span class="badge bg-pink">Pending</span>
                                                @endif
                                            </td>
                                            {{--        product_name	product_description	image	regular_price	selling_price	status	created_at	updated_at--}}
                                            <td class="text-center" style="width: 15%;">
                                                <a href="#" class="btn btn-info waves-effect getdata" data-toggle="modal"
                                                    data-id="{{ $value->id }}"
                                                    data-product_name="{{ $value->product_name }}"
                                                    data-product_description="{{ $value->product_description }}"
                                                    data-regular_price="{{ $value->regular_price }}"
                                                    data-selling_price="{{ $value->selling_price }}"
                                                    data-status="{{ $value->status }}" data-target="#exampleModal">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <button class="btn btn-danger waves-effect" type="button"
                                                    onclick="deleteProduct({{ $value->id }})">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $value->id }}"
                                                    action="{{ url('admin/productdestroy/' . $value->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--Model For Edit--}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true" style="width: 100%;">
            <form action="{{ url('admin/product/update/') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Image</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                    <input type="hidden" name="id" id="id" class="form-control" value="">
                            <div class="form-group">
                                <label for="email_address">Product Name</label>
                                <div class="form-line">
                                    <input type="text" required name="product_name" id="product_name" class="form-control" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email_address">Product Description</label>
                                <div class="form-line">
                                    <textarea name="product_description" id="product_description" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label >Regular Price</label>
                                    <input name="regular_price" id="regular_price" class="form-control"   ></input>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label >Selling Price</label>
                                    <input name="selling_price" id="selling_price" class="form-control"   ></input>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="usr">Select Image </label>
                                <input  type="file" name="image" class="form-control" id="usr">
                            </div>
                                    <label for="email_address">Status</label>
                                    <div class="form-group">
                                        <input type="checkbox" id="publish" class="" name="status" value="1">
                                        <label for="publish">Publish</label>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
            </form>
        </div>
        {{--End Modal For Edit--}}









{{--        product_name	product_description	image	regular_price	selling_price	status	created_at	updated_at--}}






        <!-- Modal  For Insert-->
        <div class="modal fade modal-xl" id="exampleModalinsert" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ url('admin/product/store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Product Info :</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="email_address">Product Name</label>
                                <div class="form-line">
                                     <input type="text" required name="product_name" id="abc" class="form-control" value="">
                                </div>
                            </div>




                            <div class="form-group">
                                <label for="email_address">Product Description</label>
                                <div class="form-line">
                                    <textarea name="product_description" id="product_description" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label for="email_address">Regular Price</label>
                                    <input name="regular_price" class="form-control"   ></input>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label for="email_address">Selling Price</label>
                                    <input name="selling_price" class="form-control"   ></input>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="usr">Select Image </label>
                                <input required type="file" name="image" class="form-control" id="usr">
                            </div>

                            <div class="form-group">
                                <label for="vehicle2">Status</label><br>
                                <input type="checkbox" id="vehicle1" name="status" value="1">
                                <label for="vehicle1"></label><br>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endsection




    @push('js')
        <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

        <script type="text/javascript">
            function deleteProduct(id) {
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false,
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        event.preventDefault();
                        document.getElementById('delete-form-' + id).submit();
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === swal.DismissReason.cancel
                    ) {
                        swal(
                            'Cancelled',
                            'Your data is safe :)',
                            'error'
                        )
                    }
                })
            }

        </script>

















            {{--        product_name	product_description	image	regular_price	selling_price	status	created_at	updated_at--}}
        <script>
            $(document).ready(function() {
                $(".getdata").click(function() {
                    // alert('atik');
                    var id = $(this).data('id');
                    var product_name = $(this).data('product_name');
                    // console.log(id);
                    var product_description = $(this).data('product_description');
                    var regular_price = $(this).data('regular_price');
                    var selling_price = $(this).data('selling_price');
                    var status = $(this).data('status');
                    if (status == 1) {
                        $('#publish').prop('checked', true)
                    } else {

                    }

                    $("#id").val(id);
                    $("#product_name").val(product_name);
                    $("#product_description").val(product_description);
                    $("#regular_price").val(regular_price);
                    $("#selling_price").val(selling_price);

                    // $("#status").val(status);



                });
            });




        </script>


















    @endpush
