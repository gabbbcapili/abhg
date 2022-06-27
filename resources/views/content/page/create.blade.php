@inject('request', 'Illuminate\Http\Request')
<div class="modal-dialog modal-md">
    <form action="{{ route('page.store', $card) }}" method="POST" class="form" enctype='multipart/form-data'>
      @method('POST')
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          Create new Page
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <label>Page Name:</label>
                    <input class="form-control" name="name" id="name">
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
      $('#content').trumbowyg();
    });
</script>
