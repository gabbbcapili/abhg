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
          Social Share
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Add new Share Buttons</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th><img class="input-group-img" src="{{ asset('images/social/facebook.png') }}"></th>
                          <th><img class="input-group-img" src="{{ asset('images/social/googleplus.png') }}"></th>
                          <th><img class="input-group-img" src="{{ asset('images/social/linkedin.png') }}"></th>
                          <th><img class="input-group-img" src="{{ asset('images/social/pinterest.png') }}"></th>
                          <th><img class="input-group-img" src="{{ asset('images/social/twitter.png') }}"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><input class="form-check-input" type="checkbox" name="facebook" value="true" /></td>
                          <td><input class="form-check-input" type="checkbox" name="googleplus" value="true" /></td>
                          <td><input class="form-check-input" type="checkbox" name="linkedin" value="true" /></td>
                          <td><input class="form-check-input" type="checkbox" name="pinterest" value="true" /></td>
                          <td><input class="form-check-input" type="checkbox" name="twitter" value="true" /></td>
                        </tr>
                      </tbody>
                    </table>
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
