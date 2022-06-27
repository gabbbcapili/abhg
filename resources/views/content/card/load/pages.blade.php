@foreach($card->pages()->orderBy('sort')->get() as $page)
        <li
            class="
            list-group-item
            list-group-item-action
            list-group-item-secondary
            page-list
            {{ $loop->first ? 'active' : '' }}
            {{ $page->editable ? '' : 'disable-sort-item' }}
            "
            id="{{ $page->id }}"
            data-name="{{ $page->name }}"
            aria-controls="list-{{ $page->id }}"
            data-bs-toggle="list"
            href="#page{{ $page->id }}" role="tab"
            data-bs-toggle="tooltip" title="{{ $page->nameFormatted }}"
        >
            {{ \Illuminate\Support\Str::limit($page->nameFormatted, 25, $end='...') }}
            @if($page->editable)
            <div class="d-flex justify-content-end">
                <div class="btn-group justify-conte" role="group">
                    <button type="button" class="btn btn-sm btn-outline-success modal_button" data-action="{{ route('page.delete', $page) }}" data-bs-toggle="tooltip" title="Delete"><i data-feather="delete"></i></button>
                    <button type="button" class="btn btn-sm btn-outline-success modal_button" data-action="{{ route('page.editName', $page) }}" data-bs-toggle="tooltip" title="Edit"><i data-feather="edit"></i></button>
                    <span role="button" class="btn btn-sm btn-outline-success cursor-move ui-icon" data-bs-toggle="tooltip" title="Move"><i class="" data-feather="move"></i></span>
                </div>
            </div>
            @endif
        </li>
@endforeach
