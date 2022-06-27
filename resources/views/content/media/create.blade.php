@inject('request', 'Illuminate\Http\Request')
<div class="modal-dialog modal-md">
    <form action="{{ route('media.store') }}" method="POST" class="form" enctype='multipart/form-data'>
      @method('POST')
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          File
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Upload a File</h4>
              </div>
              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-12">
                    <label>Supported file formats are png, jpg, gif, jpeg, pdf, doc, docx, csv, xls, xlsx, ppt, mp3, mp4</label>
                    <input type="file" name="file" class="form-control">
                  </div>
                </div>
                <div class="row" id="img">
                  <div class="col-12 mb-2">
                    <label class="form-label">Name this file: <small>(required)</small></label>
                    <input type="text" name="title" class="form-control">
                  </div>
                  <div class="col-12 mb-2">
                    <label class="form-label">Link: <small>(optional)</small></label>
                    <input type="text" name="link" class="form-control">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Caption: <small>(optional)</small></label>
                    <input type="text" name="caption" class="form-control">
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
<script>
  $(document).ready(function(){
    $('[name="file"]').change(function(){

      var type = this.files[0]["type"];
    });
  });

</script>
