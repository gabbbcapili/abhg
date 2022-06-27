@inject('request', 'Illuminate\Http\Request')
@php
  $user = $request->user();
  $contact = $request->user()->contact;
@endphp
<form action="{{ route('contact.update', $contact) }}" method="POST" class="form" enctype='multipart/form-data'>
  @method('PUT')
  @csrf
<div class="content-header">
  <h5 class="mb-0">Contact Info</h5>
  <small class="text-muted">Enter Your Contact Information.</small>
</div>
<div class="row">
  <div class="mb-1 col-md-4">
    <label class="form-label" for="title">Title</label>
    <input type="text" id="title" name="title" class="form-control" placeholder="ABGH"  value="{{ $contact->title }}"/>
  </div>
  <div class="mb-1 col-md-4">
    <label class="form-label" for="first_name">First Name</label>
    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="John"  value="{{ $user->first_name }}"/>
  </div>
  <div class="mb-1 col-md-4">
    <label class="form-label" for="last_name">Last Name</label>
    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Doe"  value="{{ $user->last_name }}"/>
  </div>
</div>
<div class="row mb-1">
  <div class="mb-1 col-md-6">
    <label class="form-label" for="job_title">Job Title</label>
    <input type="text" id="job_title" name="job_title" class="form-control" placeholder="Manager"  value="{{ $contact->title }}"/>
  </div>
  <div class="mb-1 col-md-6">
    <label class="form-label" for="business_name">Business Name</label>
    <input type="text" id="business_name" name="business_name" class="form-control" value="{{ $contact->business_name }}"/>
  </div>
</div>
<div class="d-flex justify-content-between">
  <div class="content-header">
    <h5 class="mb-0">Address</h5>
    <small class="text-muted">Enter Your Address Details.</small>
  </div>
  <div>
    <input class="form-check-input" type="checkbox" id="map_it" name="map_it" value="1"  {{ $contact->map_it ? 'checked' : '' }} />
    <label class="form-check-label small" for="map_it">Use a Map It Button for this address</label>
  </div>
</div>
<div class="row mb-1">
  <div class="mb-1 col-md-6">
    <label class="form-label" for="address_1">Address 1</label>
    <input type="text" id="address_1" name="address_1" class="form-control" placeholder="Address 1" value="{{ $contact->address_1 }}" />
  </div>
  <div class="mb-1 col-md-6">
    <label class="form-label" for="address_2">Address 2</label>
    <input type="text" id="address_2" name="address_2" class="form-control" placeholder="Address 2" value="{{ $contact->address_2 }}"/>
  </div>
</div>
<div class="row mb-1">
  <div class="mb-1 col-md-6">
    <label class="form-label" for="city">City</label>
    <input type="text" id="city" name="city" class="form-control" placeholder="City" value="{{ $contact->city }}" />
  </div>
  <div class="mb-1 col-md-3">
    <label class="form-label" for="state">State / Region</label>
    <input type="text" id="state" name="state" class="form-control" placeholder="State/Region" value="{{ $contact->state }}"/>
  </div>
  <div class="mb-1 col-md-3">
    <label class="form-label" for="zip">Zip Code</label>
    <input type="text" id="zip" name="zip" class="form-control" placeholder="Zip Code" value="{{ $contact->zip }}"/>
  </div>
</div>
<div class="row mb-1">
  <div class="mb-1 col-md-4">
    <label class="form-label" for="website">Website</label>
    <input type="text" id="website" name="website" class="form-control" placeholder="Website" value="{{ $contact->website }}"/>
  </div>
</div>
<div class="row mb-1">
  <div class="mb-1 col-md-4">
    <div class="form-check form-switch">
      <label class="form-check-label" for="allow-follow">Allow Others to Follow This Card</label>
      <input type="checkbox" name="allow_follow" class="form-check-input" id="allow-follow" value="1" {{ $contact->allow_follow ? 'checked' : '' }} />
    </div>
  </div>
</div>
<div class="row mb-1">
  <div class="mb-1 col-md-4">
    <div class="form-check form-switch">
      <label class="form-check-label" for="allow-link">Display a Link to My Card in My Contact Information:</label>
      <input type="checkbox" name="allow_link" class="form-check-input" id="allow-link" value="1" {{ $contact->allow_link ? 'checked' : '' }} />
    </div>
  </div>
</div>
<div class="row mb-1">
  <div class="col-12">
    <div class="card-header">
      <h4 class="card-title">Phone Number</h4>
      <button class="btn btn-sm btn-success addTableRow" data-table="contact_phone_table" type="button"><span data-feather="plus"></span> Add Phone Number</button>
    </div>
    <div class="table-responsive">
      <input type="hidden" id="contact_phone_row" value="{{$user->phones->count()}}">
      <table class="table" id="contact_phone_table">
        <tr>
          <th>Phone</th>
          <th>Ext</th>
          <th>Type</th>
          <th>Click To Call</th>
          <th>Text me Button</th>
          <td>-</td>
        </tr>
        @foreach($user->phones as $phone)
        <tr>
          <td>
            <input type="hidden" name="phone[{{ $phone->id }}][id]" value="{{ $phone->id }}">
            <input type="text" class="form-control" id="phone.{{ $phone->id }}.val" name="phone[{{ $phone->id }}][val]" placeholder="Phone Number" value="{{ $phone->val }}">
          </td>
          <td>
            <div class="d-flex align-items-center">
              <input type="checkbox" class="form-check-input me-1 phone_extShow" data-disable="phone[{{ $phone->id }}][text]" name="phone[{{ $phone->id }}][extShow]" value="1" {{ $phone->extShow == true ? 'checked' : '' }}>
              <input type="text" class="form-control" name="phone[{{ $phone->id }}][ext]"  id="phone.{{ $phone->id }}.ext" placeholder="Ext" value="{{ $phone->ext }}">
            </div>
          </td>
          <td>
            <select class="form-control" name="phone[{{ $phone->id }}][type]">
              <option {{ $phone->type == 'Main' ? 'selected' : '' }}>Main</option>
              <option {{ $phone->type == 'Mobile' ? 'selected' : '' }}>Mobile</option>
              <option {{ $phone->type == 'Work' ? 'selected' : '' }}>Work</option>
              <option {{ $phone->type == 'TollFree' ? 'selected' : '' }}>TollFree</option>
              <option {{ $phone->type == 'Fax' ? 'selected' : '' }}>Fax</option>
            </select>
          </td>
          <td><input class="form-check-input" type="checkbox" value="1" name="phone[{{ $phone->id }}][call]" {{ $phone->call == true ? 'checked' : '' }} /></td>
          <td><input class="form-check-input" type="checkbox" value="1" name="phone[{{ $phone->id }}][text]" {{ $phone->text == true ? 'checked' : '' }} /></td>
          <td><button type="button" class="btn btn-sm btn-danger removeTableRow" data-bs-toggle="tooltip" title="Delete Row"><span data-feather="minus"></span>
          </button>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6 offset-sm-5">
    <button type="submit" class="btn btn-primary me-1 btn_save">Save</button>
  </div>
</div>
</form>


