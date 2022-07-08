@inject('request', 'Illuminate\Http\Request')
@extends('layouts/contentLayoutMaster')

@section('title', 'Card Editor')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
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
  <style type="text/css">
    .swatch{
      position: relative;
      display: inline-block;
      width: 50px;
      height: 50px;
      background: #ddd;
      border: thin solid #000;
      border-radius: 4px;
      cursor: pointer;
    }
    .swatch.active {
      border: 8px solid #949494!important;
    }

  </style>
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/ui/ui.css')) }}">
@endsection

@section('content')

<!-- Modern Horizontal Wizard -->
<section class="modern-horizontal-wizard">
  <div class="row">
    <div class="col-lg-12">
      <div class="bs-stepper wizard-modern modern-wizard-example">
        <div class="card">
          <div class="bs-stepper-header">
            @include('content.card.partials.steps')
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="bs-stepper-content">
              <div id="accordion-home" class="content" role="tabpanel" aria-labelledby="home-step">
                @include('content.card.partials.home', ['card' => $card, 'qr' => $qr])
              </div>
              <div id="accordion-contact" class="content" role="tabpanel" aria-labelledby="contact-step">
                @include('content.card.partials.contact')
              </div>
              <div id="accordion-design" class="content" role="tabpanel" aria-labelledby="design-step">
                @include('content.card.partials.design')
              </div>
              <div id="accordion-pages" class="content" role="tabpanel" aria-labelledby="pages-step">
                @include('content.card.partials.pages', ['card' => $card])
              </div>
              <div id="accordion-gallery" class="content" role="tabpanel" aria-labelledby="gallery-step">
                @include('content.card.partials.gallery')
              </div>
              <div id="accordion-publish" class="content" role="tabpanel" aria-labelledby="publish-step">
                @include('content.card.partials.publish')
              </div>
              <div id="accordion-contact-form" class="content" role="tabpanel" aria-labelledby="contact-form-step">
                @include('content.card.partials.contact-form')
              </div>
              <div id="accordion-reports-step" class="content" role="tabpanel" aria-labelledby="reports-step">
                @include('content.card.partials.reports')
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
              <div class="card-content">
                <div class="card-header">
                  <h4 class="card-title">Preview - <small><a target="_blank" href="{{ $card->route() }}">{{ $card->name }}.{{ env('APP_DOMAIN') }}</a></small></h4>
                </div>
                <!-- <div class="card-body"> -->
                  <div class="phone-preview mt-1">
                    <div class="phone-andorid-top d-none d-md-block">
                      <div class="phone-andorid-bullat"></div>
                      <div class="phone-andorid-voice"></div>
                      <div class="phone-andorid-camera"></div>
                    </div>
                    <div class="phone-andorid-left-button1 d-none d-md-block"></div>
                    <div class="phone-andorid-left-button2 d-none d-md-block"></div>
                    <div class="phone-andorid-left-button3 d-none d-md-block"></div>
                    <div class="phone-andorid-right-button d-none d-md-block"></div>

                    <div class="d-md-flex" style="padding-top:44px;" id="phonePreview">

                    </div>
                  </div>
                <!-- </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
<!-- /Modern Horizontal Wizard -->
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
  <script src="{{ asset('vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('vendors/js/tables/datatable/responsive.bootstrap5.min.js') }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/swiper.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/content/ajax/form-wizard.js')) }}"></script>
  <script src="{{ asset(mix('js/content/ajax/form-normal.js')) }}"></script>

  <script type="text/javascript">
  var $activePage = null;
  function replaceIcons(){
    if (feather) {
      feather.replace({
        width: 14, height: 14
      });
    }
  }
  function loadPages($selectedPage = null){
    $.ajax({
          url: "{{ route('page.index', $card) }}",
          method: "GET",
          success:function(result)
          {
            $('#sortable-pages').html(result);
            $("#sortable-pages").sortable("refresh");
            replaceIcons();
            if($selectedPage){
              $activePage = $selectedPage;
              $('.page-list.active').removeClass("active");
              $('.page-list#'+ $activePage).addClass('active');
            }else{
              $activePage = $('.page-list.active').attr('id');
            }
            loadContents($activePage);
          }
      });
  }
  function loadContents($page_id){
    var urlPageContent = '{{ route("page.content", ":page") }}';
        urlPageContent = urlPageContent.replace(':page', $page_id);

    $.ajax({
          url: urlPageContent,
          method: "GET",
          success:function(result)
          {
            $("#sortable-blocks").html(result);
            replaceIcons();
          }
      });
    loadPhonePreview($page_id);


  }
  function loadSwipers(){
    var options = {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
              delay: 2500,
              disableOnInteraction: false
            },
            observer: true,
            observeParents: true,
            pagination: {
              el: '.swiper-pagination',
              clickable: true
            },
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev'
            }
          };

      $('#sortable-blocks .swiper-container').each(function(index, element){
        $(this).addClass('sw'+index);
        new Swiper('.sw'+index, options);
    });

     $('#phonePreview .swiper-container').each(function(index, element){
        $(this).addClass('s'+index);
        new Swiper('.s'+index, options);
    });


  }
  function loadPhonePreview($page_id){
    var urlPhoneContent = '{{ route("page.phone", ":page") }}';
    urlPhoneContent = urlPhoneContent.replace(':page', $page_id);
    $.ajax({
          url: urlPhoneContent,
          method: "GET",
          success:function(result)
          {
            $("#phonePreview").html(result);
            loadSwipers();
            replaceIcons();
          }
      });
  }
  $( document ).ready(function() {

    var designSwiper = new Swiper('.swiper-multi-row', {
      slidesPerView: 3,
      slidesPerColumn: 2,
      spaceBetween: 30,
      observer: true,
      observeParents: true,
      slidesPerColumnFill: 'row',
      pagination: {
        el: '.swiper-pagination',
        clickable: true
      }
    });
    $('.select2').select2();

    $(document).on('change', '#selectDesign', function(){
      var urlGetGroup = '{{ route("design.getGroup", ":group") }}';
        urlGetGroup = urlGetGroup.replace(':group', $(this).val());
      $.ajax({
          url: urlGetGroup,
          method: "GET",
          success:function(result)
          {
            $('#design_id').html(result);
            // $('[name="design_id"]').select2();
            @if($card->design_id)
              $('.swatch-{{$card->design_id}}').addClass('active');
            @endif
          }
        });
    });
    $('#selectDesign').trigger('change');

    $('.trumbowyg').trumbowyg();
    loadPages();

    $('#gallery-step').on('click', function(e){
       $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
    });

    $("#sortable-blocks").sortable({
      handle: ".ui-icon",
      items: "div.item:not(.disable-sort-item)",
      cancel: ".disable-sort-item",
      update: function (event, ui){
        var urlBlockUpdateSort = '{{ route("block.updateSort", ":page") }}';
        urlBlockUpdateSort = urlBlockUpdateSort.replace(':page', $activePage);
        $.ajax({
          url: urlBlockUpdateSort,
          method: "POST",
          data: {
            sort : $('#sortable-blocks').sortable('toArray')
          },
          success:function(result)
          {
            loadPhonePreview($activePage);
          }
        });
      }
    });
    $("#sortable-blocks").disableSelection();
    $("#sortable-pages").sortable({
      handle: ".ui-icon",
      items: "li.page-list:not(.disable-sort-item)",
      cancel: ".disable-sort-item",
      update: function (event, ui){
        $.ajax({
          url: "{{ route('page.updateSort', $card) }}",
          method: "POST",
          data: {
            sort : $('#sortable-pages').sortable('toArray')
          },
          success:function(result)
          {

          }
        });
      }
    });

    $('.view_modal').on('hidden.bs.modal', function () {
        if($('#pages-step').hasClass('active')){
          loadPages($activePage);
        }
    });
    $(document).on('click', '.page-list',function(){
      $activePage = $(this).attr('id');
      loadContents($activePage);
    });
    $(document).on('click', '.btnCreateBlock', function(){
      $('.btnCreateBlock').removeClass('active');
      $(this).addClass('active');
    });



    $(document).on('click', '.swatch', function(){
      $('.swatch').removeClass('active');
      $(this).addClass('active');
      $.ajax({
          url: "{{ route('card.updateDesign', $card) }}",
          method: "POST",
          data: {
            design_id : $(this).data('id')
          },
          success:function(result)
          {
            Swal.fire({
                icon: 'success',
                title: result.msg,
                showConfirmButton: false,
                timer: 1500,
                showClass: {
                  popup: 'animate__animated animate__fadeIn'
                },
              });
            loadPhonePreview($activePage);
          }
        });
    });


    $(document).on('click', '.addTableRow' ,function(){
      var $table = $(this).data('table');
      var $tr = '';

      if($table == 'contact_phone_table'){
        var row = parseInt($('#contact_phone_row').val()) + 1;
        $('#contact_phone_row').val(row);
        $tr += '<tr><td><input type="text" class="form-control" id="phone.'+ row +'.val" name="phone['+ row +'][val]" placeholder="Phone Number"></td>';
        $tr += '<td><div class="d-flex align-items-center"><input type="checkbox" class="form-check-input me-1 phone_extShow" data-disable="phone['+ row +'][text]" name="phone['+ row +'][extShow]" value="1"><input type="text" class="form-control" name="phone['+ row +'][ext]"  id="phone.'+ row +'.ext" placeholder="Ext"></div></td>';
        $tr += '<td><select class="form-control" name="phone['+ row +'][type]"><option>Main</option><option>Mobile</option><option>Work</option> <option>TollFree</option><option>Fax</option></select></td><td><input class="form-check-input" type="checkbox" value="1" name="phone['+ row +'][call]" /></td>';
        $tr += '<td><input class="form-check-input" type="checkbox" value="1" name="phone['+ row +'][text]" /></td>';
        $tr += '<td><button type="button" class="btn btn-sm btn-danger removeTableRow" data-bs-toggle="tooltip" title="Delete Row"><span data-feather="minus"></span></button></tr>';
        $('#'+ $table +' tr:last').after($tr);
      }else if($table == 'contact_link_table'){
        console.log('test');
        var row = parseInt($('#contact_link_row').val()) + 1;
        $('#contact_link_row').val(row);
        $tr += '<tr><td><select class="form-control" name="link['+ row +'][type]" id="link.'+ row +'.type"><option value="listing">View My Listing</option><option value="portfolio">View My Portfolio</option><option value="purchasebook">Book Now</option><option value="booknow">Purchase My Book</option><option value="shop">Shop Online</option><option value="support">Please Support</option><option value="addtional">Additional Sites</option></select></td>';
        $tr += '<td><input type="text" class="form-control" id="link.'+ row +'.title" name="link['+ row +'][title]" placeholder="Title"></td>';
        $tr += '<td><input type="text" class="form-control" id="link.'+ row +'.url" name="link['+ row +'][url]" placeholder="Url"></td>';
        $tr += '<td><button type="button" class="btn btn-sm btn-danger removeTableRow" data-bs-toggle="tooltip" title="Delete Row"><span data-feather="minus"></span></button></tr>';
        $('#'+ $table +' tr:last').after($tr);
      }
      feather.replace({
          width: 14,height: 14
        });
    });
    $(document).on('change', '.phone_extShow', function(){
      if(this.checked){
        $('[name="'+ $(this).data('disable') +'"]').prop('disabled', true);
        $('[name="'+ $(this).data('disable') +'"]').prop('checked', false);
      }else{
        $('[name="'+ $(this).data('disable') +'"]').prop('disabled', false);
      }
    })

     $(document).on( 'click', '.removeTableRow', function(){
          $(this).closest('tr').remove();
        });
  });


    var table_id = 'gallery_table'
    var table_title = 'Gallery List';
    var table_route = {
          url: '{{ route('media.index') }}',
          data: function (data) {
                // data.field = $("#field").val();
            }
        };
      var columnns = [
            { data: 'id', name: 'id'},
            { data: 'title', name: 'title'},
            { data: 'type', name: 'type'},
            { data: 'action', name: 'action', 'orderable' : false}
        ];

      var drawCallback = function( settings ) {
        $('[data-bs-toggle="tooltip"]').tooltip();
        feather.replace({
          width: 14,height: 14
        });
      };
</script>



<script src="{{ asset(mix('js/scripts/tables/table-datatables-basic.js')) }}"></script>
@endsection

