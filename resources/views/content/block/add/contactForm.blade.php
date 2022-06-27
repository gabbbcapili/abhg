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
          Contact Form
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Add a headline for this block</h4>
              </div>
              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-12">
                    <textarea class="form-control" name="headline" id="headline"></textarea>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-6">
                    <label class="form-label" data-bs-toggle="tooltip" title="Naming your form allows you to identify it in Contact Form Leads">Name this Form: <span data-feather="info"></span></label>
                    <input class="form-control" type="text" name="formName">
                  </div>
                  <div class="col-6">
                    <label class="form-label" data-bs-toggle="tooltip" title="This is the email(s) address where the email will be sent. For multiple recipients, add a comma between email addresses.">Recepient Email <span data-feather="info"></span></label>
                    <input class="form-control" type="text" name="recEmail">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-12">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Choose from options</th>
                            <th>Mark Required *</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach(App\Models\Block::$contactForm as $key => $val)
                          <tr>
                            <td>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="form[{{ $key }}]" value="1"/>
                                <label class="form-check-label">{{ $val }}</label>
                              </div>
                            </td>
                            <td>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="required[{{ $key }}]" value="1" disabled/>
                                <label class="form-check-label">Required</label>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="text-center justify-content-center align-items-center">
                      <h5 class="text-center">Add a custom field such as "Comment", or "Describe your Project"</h5>
                      <button class="btn btn-primary" id="addCustomField" type="button" ><span data-feather="plus"></span> Add Custom Field</button>
                    </div>

                    <div class="table-responsive">
                      <table class="table" id="customTable">
                        <tbody>

                        </tbody>
                      </table>
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
      var customCount = 1;
      $('#headline').trumbowyg({

      });
      $('#blockSort').val($('.btnCreateBlock.active').data('sort'));

      $( "input[name^='form']" ).change(function() {
        var str = $(this).attr('name').split("[");
        var name = 'required[' +  str[1];
        if(this.checked) {
          $('input[name="'+ name +'"]').prop("disabled", false);
        }else{
          $('input[name="'+ name +'"]').prop("disabled", true);
          $('input[name="'+ name +'"]').prop("checked", false);
        }
      });

      $('#addCustomField').click(function(){
        var tr = '<tr><td> <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="custom['+ customCount +'][show]"  value="1"/>  <input type="text" class="form-control" name="custom['+ customCount +'][val]" placeholder="Enter Custom Label"/> </div> </td> <td><div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" name="custom['+ customCount +'][required]" value="1"/><label class="form-check-label">Required </label> <button type="button" class="btn btn-sm btn-danger deleteCustomField"> <span data-feather="minus"></span> </button></div></td></tr>';
        $('#customTable tbody').append(tr);
        replaceIcons();
        customCount += 1;
      });

      $(document).on('click', '.deleteCustomField', function(){
        $(this).closest("tr").remove();
      });
    });
</script>
