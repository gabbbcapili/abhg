@extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/base/pages/page-pricing.css')}}">
@endsection

@section('content')
<!-- Kick start -->
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Kick start your next project 🚀</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
      <p>
        Getting start with your project custom requirements using a ready template which is quite difficult and time
        taking process, Vuexy Admin provides useful features to kick start your project development with no efforts !
      </p>
      <ul>
        <li>
          Vuexy Admin provides you getting start pages with different layouts, use the layout as per your custom
          requirements and just change the branding, menu &amp; content.
        </li>
        <li>
          Every components in Vuexy Admin are decoupled, it means use use only components you actually need! Remove
          unnecessary and extra code easily just by excluding the path to specific SCSS, JS file.
        </li>
      </ul>
    </div>
  </div>
</div>
<!--/ Kick start -->

<!-- Page layout -->
<section id="pricing-plan">
  <!-- title text and switch button -->
  <div class="text-center">
    <h1 class="mt-5">Pricing Plans</h1>
    <p class="mb-2 pb-75">
      All plans include 40+ advanced tools and features to boost your product. Choose the best plan to fit your needs.
    </p>
  </div>
  <!--/ title text and switch button -->

  <!-- pricing plan cards -->
  <div class="row pricing-card">
    <div class="col-12 col-sm-offset-2 col-sm-10 col-md-12 col-lg-offset-2 col-lg-10 mx-auto">
      <div class="row">
        @foreach(App\Models\Plan::all() as $plan)
        <div class="col-12 col-md-4">
          <div class="card basic-pricing text-center">
            <div class="card-body">
              <img src="{{asset('images/illustration/Pot'. $loop->iteration .'.svg')}}" height="115px" class="mb-2 mt-5" alt="svg img" />
              <h3>{{ $plan->name }}</h3>
              <p class="card-text">A simple start for everyone</p>
              <div class="annual-plan">
                <div class="plan-price mt-2">
                  <sup class="font-medium-1 fw-bold text-primary">₱</sup>
                  <span class="pricing-basic-value fw-bolder text-primary">{{ $plan->price }}</span>
                  <sub class="pricing-duration text-body font-medium-1 fw-bold"></sub>
                </div>
                <small class="annual-pricing d-none text-muted"></small>
              </div>
              <ul class="list-group list-group-circle text-start">
                <li class="list-group-item">{{ $plan->duration }} days Access to Card Functions</li>
              </ul>
              <a href="{{ route('plan.checkout', $plan) }}" class="btn w-100 btn-outline-primary mt-2">Subscribe Now</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <!--/ pricing plan cards -->

  <!-- pricing free trial -->
  <!-- <div class="pricing-free-trial">
    <div class="row">
      <div class="col-12 col-lg-10 col-lg-offset-3 mx-auto">
        <div class="pricing-trial-content d-flex justify-content-between">
          <div class="text-center text-md-start mt-3">
            <h3 class="text-primary">Still not convinced? Start with a 14-day FREE trial!</h3>
            <h5>You will get full access to with all the features for 14 days.</h5>
            <button class="btn btn-primary mt-2 mt-lg-3">Start 14-day FREE trial</button>
          </div>


          <img
            src="{{asset('images/illustration/pricing-Illustration.svg')}}"
            class="pricing-trial-img img-fluid"
            alt="svg img"
          />
        </div>
      </div>
    </div>
  </div> -->
  <!--/ pricing free trial -->

  <!-- pricing faq -->
  <div class="pricing-faq">
    <h3 class="text-center">FAQ's</h3>
    <p class="text-center">Let us help answer the most common questions.</p>
    <div class="row my-2">
      <div class="col-12 col-lg-10 col-lg-offset-2 mx-auto">
        <!-- faq collapse -->
        <div class="accordion accordion-margin" id="accordionExample">
          <div class="card accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button
                class="accordion-button collapsed"
                data-bs-toggle="collapse"
                role="button"
                data-bs-target="#collapseOne"
                aria-expanded="false"
                aria-controls="collapseOne"
              >
                Does my subscription automatically renew?
              </button>
            </h2>

            <div
              id="collapseOne"
              class="accordion-collapse collapse"
              aria-labelledby="headingOne"
              data-bs-parent="#accordionExample"
            >
              <div class="accordion-body">
                Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans gummi bears sweet roll
                bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie muffin cupcake candy
                caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit marzipan. Jujubes donut
                marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing cheesecake.
              </div>
            </div>
          </div>
          <div class="card accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button
                class="accordion-button collapsed"
                data-bs-toggle="collapse"
                role="button"
                data-bs-target="#collapseTwo"
                aria-expanded="false"
                aria-controls="collapseTwo"
              >
                Can I store the item on an intranet so everyone has access?
              </button>
            </h2>
            <div
              id="collapseTwo"
              class="accordion-collapse collapse"
              aria-labelledby="headingTwo"
              data-bs-parent="#accordionExample"
            >
              <div class="accordion-body">
                Tiramisu marshmallow dessert halvah bonbon cake gingerbread. Jelly beans chocolate pie powder. Dessert
                pudding chocolate cake bonbon bear claw cotton candy cheesecake. Biscuit fruitcake macaroon carrot cake.
                Chocolate cake bear claw muffin chupa chups pudding.
              </div>
            </div>
          </div>
          <div class="card accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button
                class="accordion-button collapsed"
                data-bs-toggle="collapse"
                role="button"
                data-bs-target="#collapseThree"
                aria-expanded="false"
                aria-controls="collapseThree"
              >
                Am I allowed to modify the item that I purchased?
              </button>
            </h2>
            <div
              id="collapseThree"
              class="accordion-collapse collapse"
              aria-labelledby="headingThree"
              data-bs-parent="#accordionExample"
            >
              <div class="accordion-body">
                Tart gummies dragée lollipop fruitcake pastry oat cake. Cookie jelly jelly macaroon icing jelly beans
                soufflé cake sweet. Macaroon sesame snaps cheesecake tart cake sugar plum. Dessert jelly-o sweet muffin
                chocolate candy pie tootsie roll marzipan. Carrot cake marshmallow pastry. Bonbon biscuit pastry topping
                toffee dessert gummies. Topping apple pie pie croissant cotton candy dessert tiramisu.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ pricing faq -->
</section>
<!--/ Page layout -->
@endsection

@section('page-script')
{{-- Page js files --}}
<script src="{{asset('js/scripts/pages/page-pricing.js')}}"></script>
@endsection
