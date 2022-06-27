<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="{{asset(mix('vendors/js/ui/jquery.sticky.js'))}}"></script>
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>

<!-- custome scripts file for user -->
<script src="{{ asset(mix('js/core/scripts.js')) }}"></script>

@if($configData['blankPage'] === false)
<script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
@endif
<!-- END: Theme JS-->

<!-- BEGIN: Global Page Scripts -->
<script src="{{ asset('vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
<!-- END: Global Page Scripts -->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->

@stack('modals')
@livewireScripts
<script defer src="{{ asset(mix('vendors/js/alpinejs/alpine.js')) }}"></script>

<script type="text/javascript">
  $(document).on('click', '.modal_button', function() {
      $.ajax({
          url: $(this).data('action'),
          method: "GET",
          success:function(result)
          {
            $('#view_modal').html(result);
              if($('#view_modal').is(':visible')){
              }else{
                $('#view_modal').modal({backdrop: 'static', keyboard: false}).modal('toggle');
              }
              if (feather) {
                feather.replace({
                  width: 14, height: 14
                });
              }
          }
      });
  });

  $(document).on('click', '.modal_button_overlap', function() {
      $.ajax({
          url: $(this).data('action'),
          method: "GET",
          success:function(result)
          {
            $('#show_modal').html(result);
            $('#show_modal').modal({backdrop: 'static', keyboard: false}).modal('toggle');
              if (feather) {
                feather.replace({
                  width: 14, height: 14
                });
              }
          }
      });
  });

  $(document).on('hidden.bs.modal', '#show_modal', function () {
      $('#show_modal').empty();
  });



  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
</script>
