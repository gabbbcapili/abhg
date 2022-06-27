@inject('request', 'Illuminate\Http\Request')
@php
  $user = $request->user();
  $contact = $request->user()->contact;
@endphp
<form action="{{ route('contact.update', $contact) }}" method="POST" class="form" enctype='multipart/form-data'>
  @method('PUT')
  @csrf
<div class="card-header">
      <h4 class="card-title">Important Links</h4>
      <button class="btn btn-sm btn-success addTableRow" data-table="contact_link_table" type="button"><span data-feather="plus"></span> Add Link</button>
    </div>
<div class="table-responsive">
      <input type="hidden" id="contact_link_row" value="{{$user->links->count()}}">
      <table class="table" id="contact_link_table">
        <tr>
          <th>Type</th>
          <th>Title</th>
          <th>Url</th>
          <td>-</td>
        </tr>
        @foreach($user->links as $link)
        <tr>
          <td>
            <input type="hidden" name="link[{{ $link->id }}][id]" value="{{ $link->id }}" >
            <select class="form-control" name="link[{{ $link->id }}][type]">
              <option {{ $link->type == 'listing' ? 'selected' : '' }} value="listing">View My Listing</option>
              <option {{ $link->type == 'portfolio' ? 'selected' : '' }} value="portfolio">View My Portfolio</option>
              <option {{ $link->type == 'purchasebook' ? 'selected' : '' }} value="purchasebook">Book Now</option>
              <option {{ $link->type == 'booknow' ? 'selected' : '' }} value="booknow">Purchase My Book</option>
              <option {{ $link->type == 'shop' ? 'selected' : '' }} value="shop">Shop Online</option>
              <option {{ $link->type == 'support' ? 'selected' : '' }} value="support">Please Support</option>
              <option {{ $link->type == 'addtional' ? 'selected' : '' }} value="addtional">Additional Sites</option>
            </select>
          </td>
          <td>
            <input type="text" class="form-control" id="link.{{ $link->id }}.title" name="link[{{ $link->id }}][title]" placeholder="Title" value="{{ $link->title }}">
          </td>
          <td>
            <input type="text" class="form-control" id="link.{{ $link->id }}.url" name="link[{{ $link->id }}][url]" placeholder="Url" value="{{ $link->url }}">
          </td>
          <td><button type="button" class="btn btn-sm btn-danger removeTableRow" data-bs-toggle="tooltip" title="Delete Row"><span data-feather="minus"></span>
          </button>
        </tr>
        @endforeach
      </table>
    </div>
<div class="row">
  <div class="col-sm-6 offset-sm-5">
    <button type="submit" class="btn btn-primary me-1 btn_save">Save</button>
  </div>
</div>
</form>
