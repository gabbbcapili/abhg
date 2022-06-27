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
          Slideshow / Gallery
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Add New Slideshow / Gallery</h4>
              </div>
              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-12">
                    <p class="card-text">Slideshow / Gallery</p>
                    <button type="button" class="btn btn-primary chooseImage modal_button_overlap mb-1" data-name="slideshow" data-action="{{ route('media.qcreate', 'image') }}">Upload New</button>
                    <select class="form-control input-lg mediaLibraryMultiple " name="slideshow[]">
                        <!-- <option selected value="" disabled></option> -->
                        @foreach($request->user()->images as $media)
                          <option value="{{ $media->id }}" data-image="{{ $media->fileUrl() }}">{{ $media->title }}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Display Type</label>
                    <select class="form-control" name="displayType">
                      <option value="gallery">Gallery</option>
                      <option value="slideshow">Slideshow</option>
                      <option value="slideshowthumb">Slideshow With Thumbnails</option>
                    </select>
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
      $('#blockSort').val($('.btnCreateBlock.active').data('sort'));
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
                 '<span><img src="' + optimage + '" width="30px" height="30px" /> ' + opt.text.toUpperCase() + '</span>'
              );
              return $opt;
          }
      };
</script>
<script src="{{ asset(mix('js/content/ajax/form-image.js')) }}"></script>
