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
          Event
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Add New Event</h4>
              </div>
              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-12">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-6">
                    <label class="form-label">Start Date</label>
                    <input type="text" name="startDate" class="form-control flatpickr-date-time" placeholder="YYYY-MM-DD HH:MM">
                  </div>
                  <div class="col-6">
                    <label class="form-label">End Date</label>
                    <input type="text" name="endDate" class="form-control flatpickr-date-time" placeholder="YYYY-MM-DD HH:MM">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-12">
                    <label class="form-label">Event Time Zone</label>
                    <select class="form-control" name="timezone">
                      @foreach(DateTimeZone::listIdentifiers(DateTimeZone::ALL) as $timezone)
                        <option value="{{ $timezone }}">{{ $timezone }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-12">
                    <label class="form-label">Venue</label>
                    <input type="text" class="form-control" name="venue">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-6">
                    <label class="form-label">Street Address</label>
                    <input type="text" class="form-control" name="street">
                  </div>
                  <div class="col-6">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control" name="city">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-6">
                    <label class="form-label">State/Region</label>
                    <input type="text" class="form-control" name="state">
                  </div>
                  <div class="col-6">
                    <label class="form-label">Zip Code</label>
                    <input type="text" class="form-control" name="zip">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-12">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="mapit" value="1"/>
                      <label class="form-check-label">Show Map It Button</label>
                    </div>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-12">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="hideOnExpire" value="1"/>
                      <label class="form-check-label">Automatically remove the event from my Card the day after the event is over.</label>
                    </div>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea rows="5" class="form-control" name="description"></textarea>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-6">
                    <label class="form-label">Purchase Tickets</label>
                    <input type="text" class="form-control" name="tickets">
                  </div>
                  <div class="col-6">
                    <label class="form-label">Register</label>
                    <input type="text" class="form-control" name="register">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-12">
                    <label class="form-label">Webinar</label>
                    <input type="text" class="form-control" name="webinar">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-12">
                    <label class="form-label">Webinar Instructions</label>
                    <textarea rows="5" class="form-control" name="webinarInstructions"></textarea>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-12">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="showRsvpForm" value="1"/>
                        <h4 class="form-check-label">Show RSVP Form</h4>
                      </div>
                    </div>
                     @foreach(App\Models\Block::$eventRsvpForm as $key => $val)
                      <div class="row mb-1">
                        <div class="col-12">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="rsvpForm[{{$key}}]" value="1"/>
                            <label class="form-check-label">{{ $val }}</label>
                          </div>
                        </div>
                      </div>
                    @endforeach
                </div>
                <div class="row mb-2">
                  <div class="col-6">
                    <label class="form-label" data-bs-toggle="tooltip" title="This is the email(s) address where the email will be sent. For multiple recipients, add a comma between email addresses.">Recepient Email <span data-feather="info"></span></label>
                    <input class="form-control" type="text" name="recEmail">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-12">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="shareByText" value="1" checked/>
                      <h4 class="form-check-label">Show "Share By Text" Button</h4>
                    </div>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-12">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="shareByEmail" value="1" checked/>
                      <h4 class="form-check-label">Show "Share By Email" Button</h4>
                    </div>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-12">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="followMe" value="1" checked/>
                      <h4 class="form-check-label">Show "Follow Me" Button</h4>
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
      $('.flatpickr-date-time').flatpickr({
        enableTime: true,
        minDate: "today"
      });
    });
</script>
