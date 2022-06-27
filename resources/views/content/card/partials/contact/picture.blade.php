@inject('request', 'Illuminate\Http\Request')
@php
  $user = $request->user();
  $contact = $request->user()->contact;
@endphp
<form action="{{ route('contact.update', $contact) }}" method="POST" class="form" enctype='multipart/form-data'>
  @method('PUT')
  @csrf
<div class="content-header">
  <h5 class="mb-0">Profile Picture and Logo</h5>
  <small>Enter Your Photos</small>
</div>
<div class="row">
  <div class="mb-1 col-md-6">
    <label class="form-label" for="modern-address">Profile Picture</label>
    <input type="file" name="profile_photo_path" class="form-control mb-2"/>
    <img src="{{ $contact->profile->fileUrl() }}" class="img-fluid">
  </div>
  <div class="mb-1 col-md-6">
    <label class="form-label" for="modern-landmark">Logo</label>
    <input type="file" name="logo_photo_path" class="form-control mb-2"/>
    <img src="{{ $contact->logo->fileUrl() }}" class="img-fluid">
  </div>
</div>
<div class="row">
  <div class="col-sm-6 offset-sm-5">
    <button type="submit" class="btn btn-primary me-1 btn_save">Save</button>
  </div>
</div>
</form>
