@inject('request', 'Illuminate\Http\Request')
<div class="modal-dialog modal-md">
    <form action="{{ $action }}" method="POST" class="form" enctype='multipart/form-data'>
        @method('DELETE')
        @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete {{ ucfirst($title) }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure to delete this {{ $title }}?
          @isset($description)
            <br>{{ $description }}
          @endisset
        </div>
        <div class="modal-footer">
              <button type="submit" class="btn btn-danger no-print btn_save"><i class="fa fa-trash"></i> Delete</button>
        </div>
      </div>
  </form>
</div>
<script src="{{ asset(mix('js/content/ajax/form-modal.js')) }}"></script>
