@inject('request', 'Illuminate\Http\Request')
<div class="modal-dialog modal-lg">
    <form action="{{ route('block.store', $page) }}" method="POST" class="form" enctype='multipart/form-data'>
      @method('POST')
      @csrf
      <input type="hidden" name="type" value="{{ $type }}">
      <input type="hidden" name="sort" value="0" id="blockSort">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <button type="button" class="btn btn-icon btn-outline-primary modal_button mx-1" data-action="{{ route('block.create', $page) }}">
            <i data-feather="arrow-left"></i>
          </button>
          Coupon
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="overflow:hidden;">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Add New Coupon</h4>
              </div>
              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-4">
                    <label class="form-label" >Border Style:</label>
                    <select class="form-control" name="borderStyle">
                      <option value="dotted">Dotted</option>
                      <option value="dashed">Dashed</option>
                      <option value="solid">Solid</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <label class="form-label">Border Color</label>
                    <input type="color" class="form-control form-control-color" name="borderColor" value="#ffffff" title="Choose border color">
                  </div>
                  <div class="col-4">
                    <label class="form-label">Background Color</label>
                    <input type="color" class="form-control form-control-color" name="backgroundColor" value="#ffffff" title="Choose border color">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-6 col-xl-6 col-sm-12">
                    <p class="card-text">Background Image</p>
                    <button type="button" class="btn btn-primary chooseImage modal_button_overlap mb-1" data-name="backgroundImage" data-action="{{ route('media.qcreate', 'image') }}">Upload New</button>
                    <select class="form-control input-lg mediaLibrary " name="backgroundImage">
                        <option selected value=""></option>
                        @foreach($request->user()->images as $media)
                          <option value="{{ $media->id }}" data-image="{{ $media->fileUrl() }}">{{ $media->title }}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="col-md-6 col-xl-6 col-sm-12">
                    <p class="card-text">Image</p>
                    <button type="button" class="btn btn-primary chooseImage modal_button_overlap mb-1" data-name="image" data-action="{{ route('media.qcreate', 'image') }}">Upload New</button>
                    <select class="form-control input-lg mediaLibrary " name="image">
                        <option selected value=""></option>
                        @foreach($request->user()->images as $media)
                          <option value="{{ $media->id }}" data-image="{{ $media->fileUrl() }}">{{ $media->title }}</option>
                        @endforeach
                      </select>
                  </div>

                </div>
                <div class="row mb-2">
                  <div class="col-12">
                    <textarea class="form-control" name="description" id="description"></textarea>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-6">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title">
                  </div>
                  <div class="col-6">
                    <label class="form-label">Terms</label>
                    <input type="text" class="form-control" name="terms">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-4">
                    <label class="form-label">Start Date</label>
                    <input type="text" name="startDate" class="form-control flatpickr-date-time" placeholder="YYYY-MM-DD HH:MM">
                  </div>
                  <div class="col-4">
                    <label class="form-label">End Date</label>
                    <input type="text" name="endDate" class="form-control flatpickr-date-time" placeholder="YYYY-MM-DD HH:MM">
                  </div>
                  <div class="col-4">
                    <label class="form-label">Expires</label>
                    <input type="text" name="expires" class="form-control flatpickr-date-time" placeholder="YYYY-MM-DD HH:MM">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-12">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="shareByText" value="1" checked/>
                      <h4 class="form-check-label">Show "Share By Text" Button</h4>
                    </div>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-12">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="shareByEmail" value="1" checked/>
                      <h4 class="form-check-label">Show "Share By Email" Button</h4>
                    </div>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-12">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="followMe" value="1" checked/>
                      <h4 class="form-check-label">Show "Follow Me" Button</h4>
                    </div>
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
      $('#description').trumbowyg();
      $('#blockSort').val($('.btnCreateBlock.active').data('sort'));
      $('.flatpickr-date-time').flatpickr({
        enableTime: true,
        minDate: "today"
      });
    });
    var formatState = function (opt) {
          if (!opt.id) {
              return opt.text.toUpperCase();
          }

          var optimage = $(opt.element).attr('data-image');
          console.log(optimage)
          if(!optimage){
             return opt.text.toUpperCase();
          } else {
              var $opt = $(
                 '<span><img src="' + optimage + '" width="30px" /> ' + opt.text.toUpperCase() + '</span>'
              );
              return $opt;
          }
      };
</script>
<script src="{{ asset(mix('js/content/ajax/form-image.js')) }}"></script>
