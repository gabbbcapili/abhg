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
          Reach Me Online
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="skype" name="show_reach[]" checked /> <label class="form-check-label">Facebook</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/skype.png') }}"></span>
                      <input type="text" class="form-control" name="skype" placeholder="skype" aria-label="skype" aria-describedby="skype" value="{{ $contact->skype }}"/>
                    </div>
                  </div>
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="whatsapp" name="show_reach[]" checked /> <label class="form-check-label">Facebook</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/whatsapp.png') }}"></span>
                      <input type="text" class="form-control" name="whatsapp" placeholder="whatsapp" aria-label="whatsapp" aria-describedby="whatsapp" value="{{ $contact->whatsapp }}"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="wechat" name="show_reach[]" checked /> <label class="form-check-label">We Chat</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/wechat.png') }}"></span>
                      <input type="text" class="form-control" name="wechat" placeholder="wechat" aria-label="wechat" aria-describedby="wechat" value="{{ $contact->wechat }}"/>
                    </div>
                  </div>
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="zoom" name="show_reach[]" checked /> <label class="form-check-label">Zoom</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/zoom.png') }}"></span>
                      <input type="text" class="form-control" name="zoom" placeholder="zoom" aria-label="zoom" aria-describedby="zoom" value="{{ $contact->zoom }}"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="joinme" name="show_reach[]" checked /> <label class="form-check-label">Join Me</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/joinme.png') }}"></span>
                      <input type="text" class="form-control" name="joinme" placeholder="joinme" aria-label="joinme" aria-describedby="joinme" value="{{ $contact->joinme }}"/>
                    </div>
                  </div>
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="viber" name="show_reach[]" checked /> <label class="form-check-label">Viber</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/viber.png') }}"></span>
                      <input type="text" class="form-control" name="viber" placeholder="viber" aria-label="viber" aria-describedby="viber" value="{{ $contact->viber }}"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="googlehangout" name="show_reach[]" checked /> <label class="form-check-label">Google Hang Out</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/googlehangout.png') }}"></span>
                      <input type="text" class="form-control" name="googlehangout" placeholder="googlehangout" aria-label="googlehangout" aria-describedby="googlehangout" value="{{ $contact->googlehangout }}"/>
                    </div>
                  </div>
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="voxer" name="show_reach[]" checked /> <label class="form-check-label">Voxer</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/voxer.png') }}"></span>
                      <input type="text" class="form-control" name="voxer" placeholder="voxer" aria-label="voxer" aria-describedby="voxer" value="{{ $contact->voxer }}"/>
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
      $('#blockSort').val($('.btnCreateBlock.active').data('sort'));
    });
</script>
