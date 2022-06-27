@inject('request', 'Illuminate\Http\Request')
@extends('layouts/fullLayoutMaster')

@section('title', $card->url)

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/swiper.min.css')) }}">
@endsection

@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/mobile/mobileview.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/trumbowyg/trumbowyg.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
@endsection

@section('content')
<div class="d-flex justify-content-center">
  <div class="phone-preview ">
    <div class="phone-andorid-top d-none d-md-block">
      <div class="phone-andorid-bullat"></div>
      <div class="phone-andorid-voice"></div>
      <div class="phone-andorid-camera"></div>
    </div>
    <div class="phone-andorid-left-button1 d-none d-md-block"></div>
    <div class="phone-andorid-left-button2 d-none d-md-block"></div>
    <div class="phone-andorid-left-button3 d-none d-md-block"></div>
    <div class="phone-andorid-right-button d-none d-md-block"></div>

    <div class="d-md-flex" style="padding-top:44px;">
      <div class="overflow-auto overflowPhone  ms-1 p-1 bg-light" style="width: 380px; height: 630px;" id="phonePreview">
        <nav class="navbar navbar-light">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><h6>Menu
              <span class="navbar-toggler-icon"></span></h6>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @foreach($card->pages as $pageNav)
                    <li class="nav-item">
                      <a class="nav-link {{ $page->id == $pageNav->id ? 'active' : '' }}" href="{{ route('card.show', ['card' => $card, 'page_url' => $pageNav->url]) }}">{{ $pageNav->name }}</a>
                    </li>
                @endforeach
              </ul>
            </div>
        </nav>
        @foreach($page->blocks()->orderBy('sort')->get() as $block)

        @include('content.card.blockMaster', ['block' => $block])

        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/jquery/jquery-ui.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/trumbowyg/trumbowyg.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/swiper.min.js')) }}"></script>
@endsection
@section('page-script')
<script type="text/javascript">
  var $activePage = null;
  function replaceIcons(){
    if (feather) {
      feather.replace({
        width: 14, height: 14
      });
    }
  }
  $(document).ready(function(){
    var swiper = new Swiper('.swiper-autoplay', {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev'
        }
      });
      replaceIcons();
  });
</script>
@endsection
