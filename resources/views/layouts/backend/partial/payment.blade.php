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
                                Payment Table
                            </h2>
                            <div class="col text-right">
{{--                                <a style="width: 200px;" type="button" class="btn btn-outline-info  float-right "--}}
{{--                                    data-toggle="modal" data-target="#exampleModalinsert" value="Add Photo">Add Payment</a>--}}
                            </div>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-condensed">
                                <thead>

                                    <tr>
                                        <th style="width: 5%">#Sl</th>
                                        <th style="width: 20%">Name</th>
                                        <th style="width: 20%">Email</th>
                                        <th style="width: 15%">Item Price</th>
                                        <th style="width: 5%">Payment Status</th>
                                        <th style="width: 20%" class="text-center">Action
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <th style="width: 5%" scope="row">{{ $key + 1 }}</th>
                                            <td style="width: 20%">{{$value->name}}</td>
                                            <td style="width: 20%">{{$value->email}}...</td>
                                            <td style="width: 15%">{{$value->item_price}}</td>
                                            <td style="width: 20%">
                                                @if ($value->status == true)
                                                    <span class="badge bg-blue">Published</span>
                                                @else
                                                    <span class="badge bg-pink">Pending</span>
                                                @endif
                                            </td>

                                            {{--                        id	name	email	item_code	item_price	currency	address_line_1	address_line_2	country	city	state	zip	txn_id	payment_status	create_at	update_at	created_at	updated_at--}}
                                            <td class="text-center" style="width: 15%;">
                                                <a href="#" class="btn btn-info waves-effect getdata" data-toggle="modal"
                                                    data-id="{{ $value->id }}"
                                                    data-name="{{ $value->name }}"
                                                    data-email="{{ $value->email }}"
                                                    data-item_code="{{ $value->item_code }}"
                                                    data-item_price="{{ $value->item_price }}"
                                                    data-currency="{{ $value->currency }}"
                                                    data-address_line_1="{{ $value->address_line_1 }}"
                                                    data-address_line_2="{{ $value->address_line_2 }}"
                                                    data-country="{{ $value->country }}"
                                                    data-city="{{ $value->city }}"
                                                    data-state="{{ $value->state }}"
                                                    data-zip="{{ $value->zip }}"
                                                    data-txn_id="{{ $value->txn_id }}"
                                                    data-status="{{ $value->status }}" data-target="#exampleModal">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <button class="btn btn-danger waves-effect" type="button"
                                                    onclick="deletePayment({{ $value->id }})">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $value->id }}"
                                                    action="{{ url('admin/paymentdestroy/' . $value->id) }}" method="POST"
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
            <form action="{{ url('admin/payment/update/') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Payment Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

{{--                        id	name	email	item_code	item_price	currency	address_line_1	address_line_2	country	city	state	zip	txn_id	payment_status	create_at	update_at	created_at	updated_at--}}

                        <div class="modal-body">
                                    <input type="hidden" name="id" id="id" class="form-control" value="">
                            <div class="form-group">
                                <label for="email_address">Name</label>
                                <div class="form-line">
                                    <input type="text" required name="name" id="name" class="form-control" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email_address">Email</label>
                                <div class="form-line">
{{--                                    <textarea name="email" id="email" cols="30" rows="5" class="form-control"></textarea>--}}
                                    <input type="email" name="email" id="email"  class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label >Item Code</label>
                                    <input type="text" name="item_code" id="item_code" class="form-control"   ></input>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label >Item Price</label>
                                    <input name="item_price" id="item_price" class="form-control" type="text"  ></input>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label >Currency</label>
                                    <input name="currency" id="currency" class="form-control"  type="text"  ></input>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="email_address">Address Line 1</label>
                                <div class="form-line">
                                    <textarea name="address_line_1" id="address_line_1" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email_address">Address Line 2</label>
                                <div class="form-line">
                                    <textarea name="address_line_2" id="address_line_2" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>

{{--                            country	city	state	zip	txn_id	payment_status	create_at	update_at	created_at	updated_at--}}

                            <div class="form-group">
                                <div class="form-line">
                                    <label >Country</label>
                                    <input name="country" id="country" class="form-control" type="text"  ></input>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label >City</label>
                                    <input name="city" id="city" class="form-control" type="text"  ></input>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label >State</label>
                                    <input name="state" id="state" class="form-control" type="text"  ></input>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label >Zip</label>
                                    <input name="zip" id="zip" class="form-control" type="text"  ></input>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label >Ten Id</label>
                                    <input name="txn_id" id="txn_id" class="form-control" type="text"  ></input>
                                </div>
                            </div>

                            <label for="email_address">Payment Status</label>
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















        <!-- Modal  For Insert-->
        <div class="modal fade modal-xl" id="exampleModalinsert" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ url('admin/payment/store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Payment Info :</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="email_address">Name</label>
                                <div class="form-line">
                                    <input type="text" required name="name" id="name" class="form-control" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email_address">Email</label>
                                <div class="form-line">
                                    {{--                                    <textarea name="email" id="email" cols="30" rows="5" class="form-control"></textarea>--}}
                                    <input type="email" name="email" id="email"  class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label >Item Code</label>
                                    <input type="text" name="item_code" id="item_code" class="form-control"   ></input>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label >Item Price</label>
                                    <input name="item_price" id="item_price" class="form-control" type="text"  ></input>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label >Currency</label>
                                    <input name="currency" id="currency" class="form-control"  type="text"  ></input>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="email_address">Address Line 1</label>
                                <div class="form-line">
                                    <textarea name="address_line_1" id="address_line_1" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email_address">Address Line 2</label>
                                <div class="form-line">
                                    <textarea name="address_line_2" id="address_line_2" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>

                            {{--                            country	city	state	zip	txn_id	payment_status	create_at	update_at	created_at	updated_at--}}

                            <div class="form-group">
                                <div class="form-line">
                                    <label >Country</label>
                                    <input name="country" id="country" class="form-control" type="text"  ></input>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label >City</label>
                                    <input name="city" id="city" class="form-control" type="text"  ></input>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label >State</label>
                                    <input name="state" id="state" class="form-control" type="text"  ></input>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label >Zip</label>
                                    <input name="zip" id="zip" class="form-control" type="text"  ></input>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label >Ten Id</label>
                                    <input name="txn_id" id="txn_id" class="form-control" type="text"  ></input>
                                </div>
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <div class="form-line">--}}
{{--                                    <label >Payment Status</label>--}}
{{--                                    <input name="status" id="status" class="form-control" type="text"  ></input>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <label for="email_address">Payment Status</label>
                            <div class="form-group">
                                <input type="checkbox" id="publish" class="" name="status" value="1">
                                <label for="publish">Publish</label>
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <div class="form-line">--}}
{{--                                    <label >Create at</label>--}}
{{--                                    <input name="create_at" id="create_at" class="form-control" type="text"  ></input>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <div class="form-line">--}}
{{--                                    <label >Update at</label>--}}
{{--                                    <input name="updated_at" id="updated_at" class="form-control" type="text"></input>--}}
{{--                                </div>--}}
{{--                            </div>--}}


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
            function deletePayment(id) {
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

















            {{--                        id	name	email	item_code	item_price	currency	address_line_1	address_line_2	country	city	state	zip	txn_id	payment_status	create_at	update_at	created_at	updated_at--}}
        <script>
            $(document).ready(function() {
                $(".getdata").click(function() {
                    // alert('atik');
                    var id = $(this).data('id');
                    var name = $(this).data('name');
                    // console.log(id);
                    var email = $(this).data('email');
                    var item_code = $(this).data('item_code');
                    var item_price = $(this).data('item_price');
                    var currency = $(this).data('currency');
                    var address_line_1 = $(this).data('address_line_1');
                    var address_line_2 = $(this).data('address_line_2');
                    var country = $(this).data('country');
                    var city = $(this).data('city');
                    var state = $(this).data('state');
                    var zip = $(this).data('zip');
                    var txn_id = $(this).data('txn_id');
                    var status = $(this).data('status');
                    if (status == 1) {
                        $('#publish').prop('checked', true)
                    } else {

                    }

                    $("#id").val(id);
                    $("#name").val(name);
                    $("#email").val(email);
                    $("#item_code").val(item_code);
                    $("#item_price").val(item_price);
                    $("#currency").val(currency);
                    $("#address_line_1").val(address_line_1);
                    $("#address_line_2").val(address_line_2);
                    $("#country").val(country);
                    $("#city").val(city);
                    $("#state").val(state);
                    $("#zip").val(zip);
                    $("#txn_id").val(txn_id);





                });
            });




            // $(document).on("click", ".getdata", function () {
            //     var photodata = $(this).data('id');
            //     $("#abc").val(photodata);
            //     // As pointed out in comments,
            //     // it is unnecessary to have to manually call the modal.
            //     // $('#addBookDialog').modal('show');
            // });

        </script>


















    @endpush
