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
          Name, Title, Business
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Choose the information you want to be displayed on your Card:</h4>
              </div>
              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-md-6">
                    <input class="form-check-input" type="checkbox" value="1" name="show_title" checked />
                    <label class="form-label" for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="ABGH"  value="{{ $contact->title }}"/>
                  </div>
                </div>
                <div class="row mb-1">
                  <div class="col-md-6">
                    <input class="form-check-input" type="checkbox" value="1" name="show_first_name" checked />
                    <label class="form-label" for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="John"  value="{{ $user->first_name }}"/>
                  </div>
                  <div class="col-md-6">
                    <input class="form-check-input" type="checkbox" value="1" name="show_last_name" checked />
                    <label class="form-label" for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Doe"  value="{{ $user->last_name }}"/>
                  </div>
                </div>
                <div class="row mb-1">
                  <div class="col-md-6">
                    <input class="form-check-input" type="checkbox" value="1" name="show_job_title" checked />
                    <label class="form-label" for="job_title">Job Title</label>
                    <input type="text" id="job_title" name="job_title" class="form-control" placeholder="Manager"  value="{{ $contact->job_title }}"/>
                  </div>
                  <div class="col-md-6">
                    <input class="form-check-input" type="checkbox" value="1" name="show_business_name" checked />
                    <label class="form-label" for="business_name">Business Name</label>
                    <input type="text" id="business_name" name="business_name" class="form-control" value="{{ $contact->business_name }}"/>
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
