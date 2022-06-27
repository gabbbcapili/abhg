<nav class="navbar navbar-light">
  <!-- <div class="container-fluid"> -->
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><h6>Menu
      <span class="navbar-toggler-icon"></span></h6>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @foreach($page->card->pages as $pageNav)
            <li class="nav-item">
              <a class="nav-link {{ $loop->first ? 'active' : '' }}" href="#">{{ $pageNav->name }}</a>
            </li>
        @endforeach
      </ul>
    </div>
  <!-- </div> -->
</nav>
@foreach($page->blocks()->orderBy('sort')->get() as $block)

@include('content.card.blockMaster', ['block' => $block])

@endforeach
