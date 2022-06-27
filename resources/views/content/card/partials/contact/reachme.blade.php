@inject('request', 'Illuminate\Http\Request')
@php
  $user = $request->user();
  $contact = $request->user()->contact;
@endphp
<form action="{{ route('contact.update', $contact) }}" method="POST" class="form" enctype='multipart/form-data'>
  @method('PUT')
  @csrf
<div class="content-header mb-1">
  <h5 class="mb-0">Reach Me Online</h5>
</div>

<div class="row">
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/skype.png') }}"></span>
      <input type="text" class="form-control" name="skype" placeholder="skype" aria-label="skype" aria-describedby="skype" value="{{ $contact->skype }}"/>
    </div>
  </div>
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/whatsapp.png') }}"></span>
      <input type="text" class="form-control" name="whatsapp" placeholder="whatsapp" aria-label="whatsapp" aria-describedby="whatsapp" value="{{ $contact->whatsapp }}"/>
    </div>
  </div>
</div>

<div class="row">
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/wechat.png') }}"></span>
      <input type="text" class="form-control" name="wechat" placeholder="wechat" aria-label="wechat" aria-describedby="wechat" value="{{ $contact->wechat }}"/>
    </div>
  </div>
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/zoom.png') }}"></span>
      <input type="text" class="form-control" name="zoom" placeholder="zoom" aria-label="zoom" aria-describedby="zoom" value="{{ $contact->zoom }}"/>
    </div>
  </div>
</div>

<div class="row">
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/joinme.png') }}"></span>
      <input type="text" class="form-control" name="joinme" placeholder="joinme" aria-label="joinme" aria-describedby="joinme" value="{{ $contact->joinme }}"/>
    </div>
  </div>
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/viber.png') }}"></span>
      <input type="text" class="form-control" name="viber" placeholder="viber" aria-label="viber" aria-describedby="viber" value="{{ $contact->viber }}"/>
    </div>
  </div>
</div>

<div class="row">
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/googlehangout.png') }}"></span>
      <input type="text" class="form-control" name="googlehangout" placeholder="googlehangout" aria-label="googlehangout" aria-describedby="googlehangout" value="{{ $contact->googlehangout }}"/>
    </div>
  </div>
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/voxer.png') }}"></span>
      <input type="text" class="form-control" name="voxer" placeholder="voxer" aria-label="voxer" aria-describedby="voxer" value="{{ $contact->voxer }}"/>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6 offset-sm-5">
    <button type="submit" class="btn btn-primary me-1 btn_save">Save</button>
  </div>
</div>
</form>
