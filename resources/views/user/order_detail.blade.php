@extends('layouts.app')
@section('style')
<style type="text/css">
    .form-group{
        margin-bottom:2px;
    }
    </style>
@endsection
@section('content')
<main class="main">
    <div class="page-header text-center">
        <div class="container">
            <h1 class="page-title">Order Detail</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <br/>
                <div class="row">

                @include('user._sidebar')
                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            @include('layouts._message')
                            <div >
                                <div class="form-group">
                                    <label>ID : <span style="font-weight: normal">{{ $getRecord->order_number }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Name : <span style="font-weight: normal">{{ $getRecord->first_name }} {{ $getRecord->last_name }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Company Name : <span style="font-weight: normal">{{ $getRecord->company_name }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Country : <span style="font-weight: normal">{{ $getRecord->country }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Address : <span style="font-weight: normal">{{ $getRecord->address_one }} , {{ $getRecord->address_two }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>City : <span style="font-weight: normal">{{ $getRecord->city }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>State : <span style="font-weight: normal">{{ $getRecord->state }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Postcode : <span style="font-weight: normal">{{ $getRecord->postalcode }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Phone : <span style="font-weight: normal">{{ $getRecord->phone }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Email : <span style="font-weight: normal">{{ $getRecord->email }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Discount Code : <span style="font-weight: normal">{{ $getRecord->discount_code }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Discount Amount($) : <span style="font-weight: normal">{{ number_format($getRecord->discount_amount,2) }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Shipping Name : <span style="font-weight: normal">{{ $getRecord->getShipping->name }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Shipping Amount($) : <span style="font-weight: normal">{{ number_format($getRecord->shipping_amount,2) }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Total Amount($) : <span style="font-weight: normal">{{ number_format($getRecord->total_amount,2) }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Payment Method :<span style="text-transform:Capitalize;font-weight: normal">{{ $getRecord->payment_method }} </span></label>
                                </div>
                                <div class="form-group">
                                    <label>Status :
                                        <span style="font-weight: normal">@if($getRecord->status == 0)
                                            pending
                                            @elseif($getRecord->status ==1)
                                            In Progress
                                            @elseif($getRecord->status ==2)
                                            Delivered
                                            @elseif($getRecord->status ==3)
                                            Completed
                                            @elseif($getRecord->status ==4)
                                            Cancelled
                                            @endif</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Note :<span style="font-weight: normal">{{ $getRecord->note }} </span></label>
                                </div>
                                <div class="form-group">
                                    <label>Created Date : <span style="font-weight: normal">{{ date('d-m-Y h:i A', strtotime($getRecord->created_at)) }}</span></label>
                                </div>

                            </div>
                            <div class="card mt-2">
                                <div class="card-header">
                                    <h3 class="card-title">Product Detail</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0 " style="overflow: auto">
                                    <table class="table table-striped" >
                                        <thead>
                                            <tr>
                                                <th class="text-center">Image</th>
                                                <th class="text-center">Product Name</th>
                                                <th class="text-center">Qty</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Size Amount ($)</th>
                                                <th class="text-center">Total Amount ($)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($getRecord->getItem as $item )
                                                @php
                                                $getProductImage = $item->getProduct->getSingleImage($item->getProduct->id);
                                                @endphp
                                            <tr>
                                                <td><img style="width:100px;height:100px" src="{{ $getProductImage->getUploadedImage() }}"></td>
                                                <td class="text-center" style="max-width:250px"><a target="_blank" href="{{ url($item->getProduct->slug) }}">{{$item->getProduct->title }}</a>
                                                    <br>
                                                    @if(!empty( $item->color_name))
                                                    <b>Color Name :</b> {{ $item->color_name }} <br>
                                                    @endif
                                                    @if(!empty($item->size_name))
                                                    <b>Size Name :</b> {{ $item->size_name }}
                                                    <br>
                                                    @endif

                                                    @if($getRecord->status ==3)
                                                        @php
                                                            $getReview = $item->getReview($item->getProduct->id,$getRecord->id);
                                                        @endphp
                                                    @if(!empty($getReview))
                                                        <b>Rating :</b> {{ $getReview->rating }} <br>
                                                        <b>Review :</b> {{ $getReview->review }} <br>
                                                    @else
                                                    <button class="btn btn-primary MakeReview" id={{ $item->getProduct->id }} data-order="{{ $getRecord->id }}">Make Review</button>

                                                    @endif

                                                @endif
                                                </td>
                                                <td class="text-center">{{ $item->quantity }}</td>
                                                <td class="text-center">{{ $item->price }}</td>
                                                <td class="text-center">{{ number_format($item->size_price,2) }}</td>
                                                <td class="text-center">{{ number_format($item->total_price,2) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Modal -->
<div class="modal fade" id="MakeReviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Make Review</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ url('user/make-review') }}" method="post">
            @csrf
            <input type="hidden" required id="getProductId" name="product_id">
            <input type="hidden" required id="getOrderId" name="order_id">
            <div class="modal-body" style="padding: 20px">
                <div class="form-group" style="margin-bottom:15px">
                    <label>How Many Rating *</label>
                    <select class="form-control" name="rating" required>
                        <option value="">Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Review *</label>
                    <textarea class="form-control" required name="review"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@section('script')
    <script type="text/javascript">
        $('body').delegate('.MakeReview' , 'click' , function () {
            var product_id = $(this).attr('id');
            var order_id = $(this).attr('data-order');
            console.log(order_id);
            $('#getProductId').val(product_id);
            $('#getOrderId').val(order_id);
            $('#MakeReviewModal').modal('show');
        });
    </script>
@endsection
