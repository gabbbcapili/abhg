<div class="d-grid col-12 mb-1 disable-sort-item">
    <button class="btn btn-block btn-primary modal_button btnCreateBlock" data-action="{{ route('block.create', $page->id) }}" data-sort="0"><i data-feather="plus-circle"></i></button>
</div>
@foreach($page->blocks()->orderBy('sort')->get() as $block)

    <div class="item col-12 mb-1" id="{{ $block->id }}">
        <div class="border border-primary p-1 mb-1">
            <div class="row">
                <div class="col-12 mb-1">
                  <div class="btn-group" role="group">     <button type="button" class="btn btn-outline-success modal_button" data-action="{{ route('block.delete', $block) }}" data-bs-toggle="tooltip" title="Delete"><i data-feather="delete"></i></button>
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit"><i data-feather="edit"></i></button>
                    <span role="button" class="btn btn-outline-success cursor-move ui-icon" data-bs-toggle="tooltip" title="Move"><i data-feather="move"></i></span>
                  </div>
                </div>
          </div>
            @include('content.card.blockMaster', ['block' => $block, 'design_id' => null])
        </div>
        <div class="d-grid col-12 mb-1">
            <button class="btn btn-block btn-primary modal_button btnCreateBlock" data-action="{{ route('block.create', $page->id) }}" data-sort="{{ $block->sort + 1 }}"><i data-feather="plus-circle"></i></button>
        </div>
    </div>
@endforeach
