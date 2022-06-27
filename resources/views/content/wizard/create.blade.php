@inject('request', 'Illuminate\Http\Request')
@extends('layouts/contentLayoutMaster')

@section('title', 'Setup Wizard')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
@endsection

@section('content')

<!-- Modern Horizontal Wizard -->
<section class="modern-horizontal-wizard">
    <form action="{{ route('card.store') }}" method="POST" class="form form-vertical" id="wizard-form" enctype="multipart/form-data">
      <div class="bs-stepper wizard-modern modern-wizard-example">
        <div class="bs-stepper-header">
          <div class="step" data-target="#account-details-modern" role="tab" id="account-details-modern-trigger">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-box">
                <i data-feather="file-text" class="font-medium-3"></i>
              </span>
              <span class="bs-stepper-label">
                <span class="bs-stepper-title">Contact Info</span>
                <span class="bs-stepper-subtitle">Setup Account Info</span>
              </span>
            </button>
          </div>
          <div class="line">
            <i data-feather="chevron-right" class="font-medium-2"></i>
          </div>
          <div class="step" data-target="#personal-info-modern" role="tab" id="personal-info-modern-trigger">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-box">
                <i data-feather="user" class="font-medium-3"></i>
              </span>
              <span class="bs-stepper-label">
                <span class="bs-stepper-title">Social Media Links</span>
                <span class="bs-stepper-subtitle">Add Social Media Links</span>
              </span>
            </button>
          </div>
          <div class="line">
            <i data-feather="chevron-right" class="font-medium-2"></i>
          </div>
          <div class="step" data-target="#address-step-modern" role="tab" id="address-step-modern-trigger">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-box">
                <i data-feather="map-pin" class="font-medium-3"></i>
              </span>
              <span class="bs-stepper-label">
                <span class="bs-stepper-title">Picture And Logo</span>
                <span class="bs-stepper-subtitle">Upload Picture and Logo</span>
              </span>
            </button>
          </div>
          <div class="line">
            <i data-feather="chevron-right" class="font-medium-2"></i>
          </div>
          <div class="step" data-target="#social-links-modern" role="tab" id="social-links-modern-trigger">
            <button type="button" class="step-trigger">
              <span class="bs-stepper-box">
                <i data-feather="link" class="font-medium-3"></i>
              </span>
              <span class="bs-stepper-label">
                <span class="bs-stepper-title">Social Links</span>
                <span class="bs-stepper-subtitle">Add Social Links</span>
              </span>
            </button>
          </div>
        </div>
        <div class="bs-stepper-content">
          <div id="account-details-modern" class="content" role="tabpanel" aria-labelledby="account-details-modern-trigger">
            @include('content.wizard.partials.contact')
          </div>
          <div id="personal-info-modern" class="content" role="tabpanel" aria-labelledby="personal-info-modern-trigger">
            @include('content.wizard.partials.social')
          </div>
          <div id="address-step-modern" class="content" role="tabpanel" aria-labelledby="address-step-modern-trigger">
            @include('content.wizard.partials.picture')
          </div>
          <div id="social-links-modern" class="content" role="tabpanel" aria-labelledby="social-links-modern-trigger">
            <div class="content-header">
              <h5 class="mb-0">Social Links</h5>
              <small>Enter Your Social Links.</small>
            </div>
            <div class="row">
              <div class="mb-1 col-md-6">
                <label class="form-label" for="modern-twitter">Twitter</label>
                <input type="text" id="modern-twitter" class="form-control" placeholder="https://twitter.com/abc" />
              </div>
              <div class="mb-1 col-md-6">
                <label class="form-label" for="modern-facebook">Facebook</label>
                <input type="text" id="modern-facebook" class="form-control" placeholder="https://facebook.com/abc" />
              </div>
            </div>
            <div class="row">
              <div class="mb-1 col-md-6">
                <label class="form-label" for="modern-google">Google+</label>
                <input type="text" id="modern-google" class="form-control" placeholder="https://plus.google.com/abc" />
              </div>
              <div class="mb-1 col-md-6">
                <label class="form-label" for="modern-linkedin">Linkedin</label>
                <input type="text" id="modern-linkedin" class="form-control" placeholder="https://linkedin.com/abc" />
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <button class="btn btn-primary btn-prev">
                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                <span class="align-middle d-sm-inline-block d-none">Previous</span>
              </button>
              <button class="btn btn-success btn-submit">Submit</button>
            </div>
          </div>
        </div>
      </div>
  </form>
</section>
<!-- /Modern Horizontal Wizard -->
@endsection
@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/content/ajax/form-wizard.js')) }}"></script>

  <script type="text/javascript">
  // $(document).ready(function(){
    $(".select2").select2({
      width: '100%',
    });
  // });
</script>
@endsection

