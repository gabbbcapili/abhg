@inject('request', 'Illuminate\Http\Request')
<div class="modal-dialog modal-lg">
    <form action="{{ route('card.update', $card) }}" method="POST" class="form" enctype='multipart/form-data'>
      @method('PUT')
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          Edit Card
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-6">
                    <label>Card Name <span data-feather="info" data-bs-toggle="tooltip" title="This is the name of our Business Card. It creates the URL for your business card.  You can change your Business Card Name at anytime. However, it is not recommended. When you change your name, anyone who clicks on an old link to your business card will NOT get your card."></span></label>
                    <input type="text" name="name" class="form-control" value="{{ $card->name }}">
                  </div>
                </div>

                <div class="row mb-2">
                  <div class="col-12">
                    <label>Footer Text <span data-feather="info" data-bs-toggle="tooltip" title="The footer text will add duplicate text to the bottom of every page of your business card."></span></label>
                    <textarea class="form-control" name="footer_text" id="content">{{ $card->footer_text }}</textarea>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-12">
                    <label>Shared Text</label>
                    <textarea class="form-control" name="shared_text" placeholder="Check out {{ $request->user()->fullname }} at https://{{ $card->name }}.{{ ENV('APP_DOMAIn') }}">{{ $card->shared_text }}</textarea>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-6">
                    <div class="form-check form-switch">
                      <label class="form-check-label">Show Footer Links <span data-feather="info" data-bs-toggle="tooltip" title="Turn on the Footer Links to repeat your page navigation links in the footer or your business card. Turn off the Footer Links to remove the page navigation links from your footer."></span></label>
                      <input type="checkbox" name="show_footer_links" class="form-check-input" id="show_footer_links" value="1" {{ $card->show_footer_links ? 'checked' : '' }} />
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check form-switch">
                      <label class="form-check-label">Show "Follow Me" Button In App Manage QR Code</label>
                      <input type="checkbox" name="show_follow_me" class="form-check-input" id="show_follow_me" value="1" {{ $card->show_follow_me ? 'checked' : '' }} />
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
      $('#content').trumbowyg();
      $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>
