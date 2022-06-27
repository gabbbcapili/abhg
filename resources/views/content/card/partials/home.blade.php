@inject('request', 'Illuminate\Http\Request')
@php
  $user = $request->user();
@endphp
<div class="content-header">
  <h5 class="mb-0">Welcome To Card Editor</h5>
</div>
<div class="row  mb-2">
  <div class="col-xl-8 col-md-8 col-sm-12">
    <table class="table">
      <tr>
        <th><span data-feather="edit" class="mx-1"></span> Editing: <a target="_blank" href="{{ $card->route() }}">{{ $card->name }}.{{ env('APP_DOMAIN') }}</a></th>
        <td><button type="button" class="btn btn-sm btn-primary modal_button"  data-bs-toggle="tooltip" title="Edit Card Settings" data-action="{{ route('card.edit', $card) }}"><span data-feather="edit"></span></button></td>
      </tr>
      <tr>
        <td>
           <span data-feather="map-pin" class="mx-1"></span>
           <label class="form-label" data-bs-toggle="tooltip" title="This is the name of our Business Card. It creates the URL for your business card. You can change your Business Card Name at anytime. However, it is not recommended. When you change your name, anyone who clicks on an old link to your business card will NOT get your card.">Card Name: <i data-feather="info"></i></label>
        </td>

      </tr>
      <tr>
        <td>
          <span data-feather="type" class="mx-1"></span>
          <label class="form-label" data-bs-toggle="tooltip" title="The footer text will add duplicate text to the bottom of every page of your business card.">Footer Text: <i data-feather="info"></i></label>
        </td>
      </tr>
      <tr>
        <td>
          <span data-feather="type" class="mx-1"></span>
          <label class="form-label">Shared Text:</label>
        </td>
      </tr>
      <tr>
        <td>
          <div class="form-check form-switch">
            <label class="form-check-label">Show Footer Links <span data-feather="info" data-bs-toggle="tooltip" title="Turn on the Footer Links to repeat your page navigation links in the footer or your business card. Turn off the Footer Links to remove the page navigation links from your footer."></span></label>
            <input type="checkbox" name="show_footer_links" class="form-check-input" id="show_footer_links" value="1" {{ $card->show_footer_links ? 'checked' : '' }} />
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="form-check form-switch">
            <label class="form-check-label">Show "Follow Me" Button In App Manage QR Code</label>
            <input type="checkbox" name="show_follow_me" class="form-check-input" id="show_follow_me" value="1" {{ $card->show_follow_me ? 'checked' : '' }} />
          </div>
        </td>
      </tr>
    </table>

  </div>
  <div class="col-xl-4 col-md-4 col-sm-12">
      <a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(110)->generate($card->url)) !!}" download="{{ $card->url }}_qr.jpg"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(110)->generate($card->url)) !!}" download="{{ $card->url }}_qr.jpg">
      <h5>Download QR</a>
  </div>

</div>
