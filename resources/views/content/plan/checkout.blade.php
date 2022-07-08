@inject('request', 'Illuminate\Http\Request')
@extends('layouts/contentLayoutMaster')

@section('title', 'Subscription Checkout')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset('css/base/pages/app-ecommerce.css') }}">
@endsection

@section('content')
<section id="checkout">
  <form action="{{ route('plan.store', '$plan') }}" method="POST" class="form" enctype="multipart/form-data">
  @csrf
    <div class="row">
      <div class="col-md-8 col-sm-12">
        <div class="card">
          <div class="card-header flex-column align-items-start">
            <h4 class="card-title">Billing Details</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="input-group mb-2">
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="mb-2">
                    <label class="form-label" cfor="checkout-apt-number">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="{{ $request->user() ? $request->user()->fullname : '' }}">
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="mb-2">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $request->user() ? $request->user()->phone_number : '' }}">
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="mb-2">
                    <label class="form-label">Email Address</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ $request->user() ? $request->user()->email : '' }}">
                  </div>
                </div>

                <div class="col-md-6 col-sm-12">
                  <div class="mb-2">
                    <label class="form-label">Payment Method</label>
                    <select class="form-control select2" name="payment_method" id="payment_method">
                      <option value="paypal" data-image="{{ asset('images/payment_methods/paypal.png') }}" data-price="1">Paypal</option>
                      <!-- <option value="gcash" data-image="{{ asset('images/payment_methods/gcash.png') }}" data-price="1">Gcash</option> -->
                      <!-- <option value="paymaya" data-image="{{ asset('images/payment_methods/paymaya.png') }}" data-price="1">Paymaya</option> -->
                    </select>
                  </div>
                </div>
            </div>
            <div class="row mb-2 text-center">
              <div id="paypal-button-container"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="card-header">
              <h4 class="card-title">Your Order</h4>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li>
                    <a data-action="reload" id="refresh"><i data-feather="rotate-cw"></i></a>
                  </li>
                </ul>
              </div>
            </div>
              <div class="coupons input-group input-group-merge px-1">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Coupons"
                  aria-label="Coupons"
                  aria-describedby="input-coupons"
                />
                <span class="input-group-text text-primary ps-1" id="input-coupons">Apply</span>
              </div>
            <hr />
            <div class="table-responsive" id="productTable">
              <table class="table">
                <tr>
                  <th class="text-start">Product</th>
                  <th class="text-end">Total</th>
                </tr>
                <tr>
                  <td class="text-start">{{ $plan->name }} - Card Access</td>
                  <th class="text-end">₱{{ number_format($plan->price, 2) }}</th>
                </tr>
                <tr>
                  <td class="text-start">- {{ $plan->duration }} Days</td>
                  <th class="text-end"></th>
                </tr>
                <tr>
                  <td class="text-start">Subtotal</td>
                  <th class="text-end">₱{{ number_format($plan->price, 2) }}</th>
                </tr>
                <tr>
                  <td class="text-start">Total</td>
                  <th class="text-end">₱{{ number_format($plan->price, 2) }}</th>
                </tr>
            </table>
            </div>
              <!-- <input type="submit" class="btn btn-primary w-100 place-order btn_save" value="Place Order"> -->
          </div>
        </div>
      </div>
    </form>

</section>

@endsection

@section('vendor-script')
<script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
@endsection

@section('page-script')
<script src="{{ asset(mix('js/content/ajax/form-normal.js')) }}"></script>
<script src="https://www.paypal.com/sdk/js?client-id={{config('paypal.mode') == 'sandbox' ? config('paypal.sandbox.client_id') : config('paypal.live.client_id')}}&currency=PHP"></script>
<script>
  // Render the PayPal button into #paypal-button-container
  paypal.Buttons({
  // Call your server to set up the transaction
       createOrder: function(data, actions) {
          return fetch('{{ route("api.plan.initiate", $plan) }}', {
              method: 'POST',
              body:JSON.stringify({
                  'user_id': "{{ auth()->user()->id }}",
                  'plan_id': "{{ $plan->id }}",
                  'payment_method' : $("#payment_method").val(),
                  'name' : $("#name").val(),
                  'phone' : $("#phone").val(),
                  'email' : $("#email").val(),
              })
          }).then(function(res) {
              //res.json();
              return res.json();
          }).then(function(orderData) {
              console.log(orderData);
              return orderData.order.id;
          });
      },

      // Call your server to finalize the transaction
      onApprove: function(data, actions) {
          return fetch('{{ route("api.plan.capture", $plan) }}' , {
              method: 'POST',
              body :JSON.stringify({
                  orderId : data.orderID,
                  payment_gateway_id: $("#payapalId").val(),
                  user_id: "{{ auth()->user()->id }}",
              })
          }).then(function(res) {
             // console.log(res.json());
              return res.json();
          }).then(function(orderData) {
             // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
              // var transaction = orderData.purchase_units[0].payments.captures[0];
               Swal.fire({
                icon: 'success',
                title: orderData.msg,
                showConfirmButton: false,
                timer: 1500,
                showClass: {
                  popup: 'animate__animated animate__fadeIn'
                },
              });
               window.location.replace(orderData.redirect);
          });
      }

  }).render('#paypal-button-container');
</script>
<script type="text/javascript">
  $(".select2").select2({
        templateResult: formatState,
        templateSelection: formatState
    });

    function formatState (opt) {
        if (!opt.id) {
            return opt.text.toUpperCase();
        }

        var optimage = $(opt.element).attr('data-image');
        if(!optimage){
           return opt.text.toUpperCase();
        } else {
            var $opt = $(
               '<span><img src="' + optimage + '" width="25px" /> ' + opt.text.toUpperCase() + '</span>'
            );
            return $opt;
        }
    }
</script>
@endsection


