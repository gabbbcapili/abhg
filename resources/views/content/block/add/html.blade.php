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
          Advance HTML Users
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Add New HTML</h4>
              </div>
              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-12">
                    <textarea class="form-control" name="html" id="html" rows="10"></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Height (in px.)</label>
                    <input type="text" name="height" class="form-control" \>
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
</script>
