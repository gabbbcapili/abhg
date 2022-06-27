@inject('request', 'Illuminate\Http\Request')
@php
  $user = $request->user();
  $contact = $request->user()->contact;
@endphp
<form action="{{ route('contact.update', $contact) }}" method="POST" class="form" enctype='multipart/form-data'>
  @method('PUT')
  @csrf
<div class="content-header">
  <h5 class="mb-0">Social Media Links</h5>
  <small>Enter Social Media Links.</small>
</div>
<div class="row">
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/facebook.png') }}"></span>
      <input type="text" class="form-control" name="facebook" placeholder="facebook" aria-label="facebook" aria-describedby="facebook" value="{{ $contact->facebook }}"/>
    </div>
  </div>
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/twitter.png') }}"></span>
      <input type="text" class="form-control" name="twitter" placeholder="twitter" aria-label="twitter" aria-describedby="twitter" value="{{ $contact->twitter }}"/>
    </div>
  </div>
</div>

<div class="row">
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/googleplus.png') }}"></span>
      <input type="text" class="form-control" name="googleplus" placeholder="googleplus" aria-label="googleplus" aria-describedby="googleplus" value="{{ $contact->googleplus }}"/>
    </div>
  </div>
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/pinterest.png') }}"></span>
      <input type="text" class="form-control" name="pinterest" placeholder="pinterest" aria-label="pinterest" aria-describedby="pinterest" value="{{ $contact->pinterest }}"/>
    </div>
  </div>
</div>

<div class="row">
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/instagram.png') }}"></span>
      <input type="text" class="form-control" name="instagram" placeholder="instagram" aria-label="instagram" aria-describedby="instagram" value="{{ $contact->instagram }}"/>
    </div>
  </div>
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/linkedin.png') }}"></span>
      <input type="text" class="form-control" name="linkedin" placeholder="linkedin" aria-label="linkedin" aria-describedby="linkedin" value="{{ $contact->linkedin }}"/>
    </div>
  </div>
</div>

<div class="row">
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/youtube.png') }}"></span>
      <input type="text" class="form-control" name="youtube" placeholder="youtube" aria-label="youtube" aria-describedby="youtube" value="{{ $contact->youtube }}"/>
    </div>
  </div>
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/yelp.png') }}"></span>
      <input type="text" class="form-control" name="yelp" placeholder="yelp" aria-label="yelp" aria-describedby="yelp" value="{{ $contact->yelp }}"/>
    </div>
  </div>
</div>

<div class="row">
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/myspace.png') }}"></span>
      <input type="text" class="form-control" name="myspace" placeholder="myspace" aria-label="myspace" aria-describedby="myspace" value="{{ $contact->myspace }}"/>
    </div>
  </div>
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/foursquare.png') }}"></span>
      <input type="text" class="form-control" name="foursquare" placeholder="foursquare" aria-label="foursquare" aria-describedby="foursquare" value="{{ $contact->foursquare }}"/>
    </div>
  </div>
</div>

<div class="row">
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/tumblr.png') }}"></span>
      <input type="text" class="form-control" name="tumblr" placeholder="tumblr" aria-label="tumblr" aria-describedby="tumblr" value="{{ $contact->tumblr }}"/>
    </div>
  </div>
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/spotify.png') }}"></span>
      <input type="text" class="form-control" name="spotify" placeholder="spotify" aria-label="spotify" aria-describedby="spotify" value="{{ $contact->spotify }}"/>
    </div>
  </div>
</div>

<div class="row">
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/soundcloud.png') }}"></span>
      <input type="text" class="form-control" name="soundcloud" placeholder="soundcloud" aria-label="soundcloud" aria-describedby="soundcloud" value="{{ $contact->soundcloud }}"/>
    </div>
  </div>
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/bandcamp.png') }}"></span>
      <input type="text" class="form-control" name="bandcamp" placeholder="bandcamp" aria-label="bandcamp" aria-describedby="bandcamp" value="{{ $contact->bandcamp }}"/>
    </div>
  </div>
</div>

<div class="row">
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/vilmeo.png') }}"></span>
      <input type="text" class="form-control" name="vilmeo" placeholder="vilmeo" aria-label="vilmeo" aria-describedby="vilmeo" value="{{ $contact->vilmeo }}"/>
    </div>
  </div>
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/snapchat.png') }}"></span>
      <input type="text" class="form-control" name="snapchat" placeholder="snapchat" aria-label="snapchat" aria-describedby="snapchat" value="{{ $contact->snapchat }}"/>
    </div>
  </div>
</div>

<div class="row">
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/reddit.png') }}"></span>
      <input type="text" class="form-control" name="reddit" placeholder="reddit" aria-label="reddit" aria-describedby="reddit" value="{{ $contact->reddit }}"/>
    </div>
  </div>
  <div class="mb-1 col-md-6">
    <div class="input-group mb-2">
      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/twitch.png') }}"></span>
      <input type="text" class="form-control" name="twitch" placeholder="twitch" aria-label="twitch" aria-describedby="twitch" value="{{ $contact->twitch }}"/>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-6 offset-sm-5">
    <button type="submit" class="btn btn-primary me-1 btn_save">Save</button>
  </div>
</div>
</form>

