@inject('request', 'Illuminate\Http\Request')
@inject('staticBlock', 'App\Models\Block')
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
          Preformatted Button
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Add Preformatted Buttons</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <table class="table table-responsive table-borderless">
                      <tr>
                        <td class="w-25">
                          <input class="form-check-input" type="radio" name="btnType" value="1" checked/>
                        </td>
                        <td class="border">
                          {!! $staticBlock->preformattedBtn(1) !!}
                        </td>
                      </tr>
                      <tr>
                        <td class="w-25">
                          <input class="form-check-input" type="radio" name="btnType" value="2"/>
                        </td>
                        <td class="border">
                          {!! $staticBlock->preformattedBtn(2) !!}
                        </td>
                      </tr>
                      <tr>
                        <td class="w-25">
                          <input class="form-check-input" type="radio" name="btnType" value="3"/>
                        </td>
                        <td class="border">
                          {!! $staticBlock->preformattedBtn(3) !!}
                        </td>
                      </tr>
                      <tr>
                        <td class="w-25">
                          <input class="form-check-input" type="radio" name="btnType" value="4"/>
                        </td>
                        <td class="border">
                          {!! $staticBlock->preformattedBtn(4) !!}
                        </td>
                      </tr>
                      <tr>
                        <td class="w-25">
                          <input class="form-check-input" type="radio" name="btnType" value="5"/>
                        </td>
                        <td class="border">
                          {!! $staticBlock->preformattedBtn(5) !!}
                        </td>
                      </tr>
                      <tr>
                        <td class="w-25">
                          <input class="form-check-input" type="radio" name="btnType" value="6"/>
                        </td>
                        <td class="border">
                          {!! $staticBlock->preformattedBtn(6) !!}
                        </td>
                      </tr>
                      <tr>
                        <td class="w-25">
                          <input class="form-check-input" type="radio" name="btnType" value="7"/>
                        </td>
                        <td class="border">
                          {!! $staticBlock->preformattedBtn(7) !!}
                        </td>
                      </tr>
                      <tr>
                        <td class="w-25">
                          <input class="form-check-input" type="radio" name="btnType" value="8"/>
                        </td>
                        <td class="border">
                          {!! $staticBlock->preformattedBtn(8) !!}
                        </td>
                      </tr>
                      <tr>
                        <td class="w-25">
                          <input class="form-check-input" type="radio" name="btnType" value="9"/>
                        </td>
                        <td class="border">
                          {!! $staticBlock->preformattedBtn(9) !!}
                        </td>
                      </tr>
                    </table>
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
      $('#content').trumbowyg({

      });
      $('#blockSort').val($('.btnCreateBlock.active').data('sort'));
    });
</script>
