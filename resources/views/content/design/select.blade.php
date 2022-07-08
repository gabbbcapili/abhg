<!-- <label>Color:</label>
    <select class="form-control select2" name="design_id">
     @if($designs->count() == 0)
        <option selected value="null">No available color for this design.</option>
     @else
        <option hidden selected></option>
     @endif
     @foreach($designs as $design)
        <option value="{{ $design->id }}" style="height:50px; width:50px; background-color: {{ $design->buttonBackgroundColor == '#fff' ? $design->headerColor : $design->buttonBackgroundColor }}"><div></div></option>
     @endforeach
</select> -->
@foreach($designs as $design)
    <div class="swatch swatch-{{$design->id}}" style="background-color:{{ $design->buttonBackgroundColor == '#fff' ? $design->headerColor : $design->buttonBackgroundColor }}" data-id="{{ $design->id }}"></div>
 @endforeach
