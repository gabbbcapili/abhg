<div class="overflow-auto  ms-1 p-1 backgroundColor-{{ $page->card->design_id }}" style="width: 380px; height: 630px;">
  <nav class="navbar menuBackgroundColor-{{ $page->card->design_id }} mb-1">
    <!-- <div class="container-fluid"> -->
      <a class="navbar-brand " href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><h6 class="menuTextColor-{{ $page->card->design_id }}">Menu
        <span data-feather="align-justify"></span></h6>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @foreach($page->card->pages as $pageNav)
              <li class="nav-item menuBackgroundColor-{{ $page->card->design_id }}">
                <a class="nav-link ps-1 pt-1 {{ $loop->first ? 'active' : '' }} menuTextColor-{{ $page->card->design_id }}" style="border-bottom: thin solid #fff;" href="#">{{ $pageNav->name }}</a>
              </li>
          @endforeach
        </ul>
      </div>
    <!-- </div> -->
  </nav>
@foreach($page->blocks()->orderBy('sort')->get() as $block)

@include('content.card.blockMaster', ['block' => $block, 'design_id' => $page->card->design_id])

@endforeach
</div>
