@inject('request', 'Illuminate\Http\Request')
<div class="modal-dialog modal-lg">
    <form action="{{ route('block.store', $page) }}" method="POST" class="form" enctype='multipart/form-data' id="formCustomBtn">
      @method('POST')
      @csrf
      <input type="hidden" name="type" value="{{ $type }}">
      <input type="hidden" name="sort" value="0" id="blockSort">
      <input type="hidden" name="finalCss" value="">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <button type="button" class="btn btn-icon btn-outline-primary modal_button mx-1" data-action="{{ route('block.create', $page) }}">
            <i data-feather="arrow-left"></i>
          </button>
          Button Maker
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Add New Customized Button</h4>
              </div>
              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-12">
                    <label>Preview</label>
                    <div class="bg-info border p-4 d-flex aligns-items-center justify-content-center">
                        <button type="button" class="" id="previewBtn">Test Button</button>
                   </div>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-6">
                    <label class="form-label">Button Label</label>
                    <input type="text" name="btnTitle" class="form-control" value="Button">
                  </div>
                  <div class="col-6">
                    <label class="form-label">Link Type</label>
                    <select class="form-control" name="linkType">
                      <option value="url">Url</option>
                      <option value="call" selected>Call Me</option>
                      <option value="text">Text Me</option>
                      <option value="email">Email Me</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-2 rowLinkUrl">
                  <div class="col-12">
                    <label class="form-label">Link Url</label>
                    <input class="form-control" type="text" name="linkUrl"/>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-6">
                    <label class="form-label">Button Width</label>
                    <input type="range"  class="form-range" min="10" max="100" value="100" name="btnWidth"/>
                  </div>
                  <div class="col-6">
                    <label class="form-label">Font Size</label>
                    <input type="range"  class="form-range" min="10" max="50" value="24" name="btnFontSize"/>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-6">
                    <label class="form-label">Corner Roundness</label>
                    <input type="range"  class="form-range" min="0" max="30" value="0" name="btnBorderRadius"/>
                  </div>
                  <div class="col-6">
                    <label class="form-label">Boarder Thickness</label>
                    <input type="range"  class="form-range" min="0" max="10" value="0" name="btnBorder"/>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-4">
                    <label class="form-label">Button Color</label>
                    <input type="color" class="form-control form-control-color" name="btnColor" value="#086287" title="Choose button color">
                  </div>
                  <div class="col-4">
                    <label class="form-label">Button Text Color</label>
                    <input type="color" class="form-control form-control-color" name="btnTxtColor" value="#ffffff" title="Choose text color">
                  </div>
                  <div class="col-4">
                    <label class="form-label">Button Boarder Color</label>
                    <input type="color" class="form-control form-control-color" name="btnBorderColor" value="#ffffff" title="Choose boarder color">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary no-print btn_save"><i data-feather="save"></i> Save
          </button>
      </div>
    </div>
  </form>
</div>
<script src="{{ asset(mix('js/content/ajax/form-modal.js')) }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
      updatePreview();
      $('.rowLinkUrl').hide();
      $('#blockSort').val($('.btnCreateBlock.active').data('sort'));

      $('select[name="linkType"]').change(function(){
        if($(this).val() == 'url'){
          $('.rowLinkUrl').show();
        }else{
          $('.rowLinkUrl').hide();
          $('input[name="linkUrl"]').val('');
        }
      });
      function updatePreview(){
        var css = {
          'color': $('[name="btnTxtColor"]').val(),
          'background-color': $('[name="btnColor"]').val(),
          'border': $('[name="btnBorder"]').val() + 'px solid',
          'border-color': $('[name="btnBorderColor"]').val(),
          'width': $('[name="btnWidth"]').val() + '%',
          'border-radius': $('[name="btnBorderRadius"]').val() + 'px',
          'font-size': $('[name="btnFontSize"]').val() +'px',
         };
         $('#previewBtn').text($('[name="btnTitle"]').val());
         $("#previewBtn").css(css);
         $('[name="finalCss"]').val($('#previewBtn').attr('style'));
      }

      $('[name="btnTitle"]').keyup(function(){
        updatePreview();
      })
      $('')
      $('.form-range').change(function(){
        updatePreview();
      })
      $('.form-control-color').change(function(){
        updatePreview();
      })
    });
</script>
