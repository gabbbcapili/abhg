@inject('request', 'Illuminate\Http\Request')
@php
  $user = $request->user();
  $contact = $user->contact;
@endphp
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
          Profile Photo and logo
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
                    <table class="table">
                      <tr>
                        <td><input class="form-check-input" type="radio" name="showimage" value="profile" checked/> <label class="form-check-label">Profile</label></td>
                        <td><img src="{{ $contact->profile ? $contact->profile->fileUrl() : $contact->noimage  }}" height="200px"></td>
                      </tr>
                      <tr>
                        <td><input class="form-check-input" type="radio" name="showimage" value="logo"/> <label class="form-check-label">Logo</label></td>
                        <td><img src="{{ $contact->logo ? $contact->logo->fileUrl() : $contact->noimage  }}" height="200px"></td>
                      </tr>
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
      $('#content').trumbowyg();
      $('#blockSort').val($('.btnCreateBlock.active').data('sort'));
    });
</script>
