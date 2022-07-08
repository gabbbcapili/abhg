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
          Social Media
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
                    <input class="form-check-input mb-1" type="checkbox" value="facebook" name="show_social[]" checked /> <label class="form-check-label">Facebook</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/facebook.png') }}"></span>
                      <input type="text" class="form-control" name="facebook" placeholder="facebook" aria-label="facebook" aria-describedby="facebook" value="{{ $contact->facebook }}"/>
                    </div>
                  </div>
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="twitter" name="show_social[]" checked /> <label class="form-check-label">Twitter</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/twitter.png') }}"></span>
                      <input type="text" class="form-control" name="twitter" placeholder="twitter" aria-label="twitter" aria-describedby="twitter" value="{{ $contact->twitter }}"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="googleplus" name="show_social[]" checked /> <label class="form-check-label">GooglePlus</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/googleplus.png') }}"></span>
                      <input type="text" class="form-control" name="googleplus" placeholder="googleplus" aria-label="googleplus" aria-describedby="googleplus" value="{{ $contact->googleplus }}"/>
                    </div>
                  </div>
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="pinterest" name="show_social[]" checked /> <label class="form-check-label">Pinterest</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/pinterest.png') }}"></span>
                      <input type="text" class="form-control" name="pinterest" placeholder="pinterest" aria-label="pinterest" aria-describedby="pinterest" value="{{ $contact->pinterest }}"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="instagram" name="show_social[]" checked /> <label class="form-check-label">Instagram</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/instagram.png') }}"></span>
                      <input type="text" class="form-control" name="instagram" placeholder="instagram" aria-label="instagram" aria-describedby="instagram" value="{{ $contact->instagram }}"/>
                    </div>
                  </div>
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="linkedin" name="show_social[]" checked /> <label class="form-check-label">LinkedIn</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/linkedin.png') }}"></span>
                      <input type="text" class="form-control" name="linkedin" placeholder="linkedin" aria-label="linkedin" aria-describedby="linkedin" value="{{ $contact->linkedin }}"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="youtube" name="show_social[]" checked /> <label class="form-check-label">Youtube</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/youtube.png') }}"></span>
                      <input type="text" class="form-control" name="youtube" placeholder="youtube" aria-label="youtube" aria-describedby="youtube" value="{{ $contact->youtube }}"/>
                    </div>
                  </div>
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="yelp" name="show_social[]" checked /> <label class="form-check-label">Yelp</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/yelp.png') }}"></span>
                      <input type="text" class="form-control" name="yelp" placeholder="yelp" aria-label="yelp" aria-describedby="yelp" value="{{ $contact->yelp }}"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="myspace" name="show_social[]" checked /> <label class="form-check-label">MySpace</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/myspace.png') }}"></span>
                      <input type="text" class="form-control" name="myspace" placeholder="myspace" aria-label="myspace" aria-describedby="myspace" value="{{ $contact->myspace }}"/>
                    </div>
                  </div>
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="foursquare" name="show_social[]" checked /> <label class="form-check-label">FourSquare</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/foursquare.png') }}"></span>
                      <input type="text" class="form-control" name="foursquare" placeholder="foursquare" aria-label="foursquare" aria-describedby="foursquare" value="{{ $contact->foursquare }}"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="tumblr" name="show_social[]" checked /> <label class="form-check-label">Tumblr</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/tumblr.png') }}"></span>
                      <input type="text" class="form-control" name="tumblr" placeholder="tumblr" aria-label="tumblr" aria-describedby="tumblr" value="{{ $contact->tumblr }}"/>
                    </div>
                  </div>
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="spotify" name="show_social[]" checked /> <label class="form-check-label">Spotify</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/spotify.png') }}"></span>
                      <input type="text" class="form-control" name="spotify" placeholder="spotify" aria-label="spotify" aria-describedby="spotify" value="{{ $contact->spotify }}"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="soundcloud" name="show_social[]" checked /> <label class="form-check-label">SoundCloud</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/soundcloud.png') }}"></span>
                      <input type="text" class="form-control" name="soundcloud" placeholder="soundcloud" aria-label="soundcloud" aria-describedby="soundcloud" value="{{ $contact->soundcloud }}"/>
                    </div>
                  </div>
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="bandcamp" name="show_social[]" checked /> <label class="form-check-label">Bandcamp</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/bandcamp.png') }}"></span>
                      <input type="text" class="form-control" name="bandcamp" placeholder="bandcamp" aria-label="bandcamp" aria-describedby="bandcamp" value="{{ $contact->bandcamp }}"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="vilmeo" name="show_social[]" checked /> <label class="form-check-label">Vilmeo</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/vilmeo.png') }}"></span>
                      <input type="text" class="form-control" name="vilmeo" placeholder="vilmeo" aria-label="vilmeo" aria-describedby="vilmeo" value="{{ $contact->vilmeo }}"/>
                    </div>
                  </div>
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="snapchat" name="show_social[]" checked /> <label class="form-check-label">Snapchat</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/snapchat.png') }}"></span>
                      <input type="text" class="form-control" name="snapchat" placeholder="snapchat" aria-label="snapchat" aria-describedby="snapchat" value="{{ $contact->snapchat }}"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="reddit" name="show_social[]" checked /> <label class="form-check-label">Reddit</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/reddit.png') }}"></span>
                      <input type="text" class="form-control" name="reddit" placeholder="reddit" aria-label="reddit" aria-describedby="reddit" value="{{ $contact->reddit }}"/>
                    </div>
                  </div>
                  <div class="mb-1 col-md-6">
                    <input class="form-check-input mb-1" type="checkbox" value="twitch" name="show_social[]" checked /> <label class="form-check-label">Twitch</label>
                    <div class="input-group mb-2">
                      <span class="input-group-text"><img class="input-group-img" src="{{ asset('images/social/twitch.png') }}"></span>
                      <input type="text" class="form-control" name="twitch" placeholder="twitch" aria-label="twitch" aria-describedby="twitch" value="{{ $contact->twitch }}"/>
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
      $('#blockSort').val($('.btnCreateBlock.active').data('sort'));
    });
</script>
