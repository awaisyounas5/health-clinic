<select class="form-control" id="shift_type" name="shift_type_id" required>
    <option value="" selected disabled>Choose Shift Type</option>
    @if($shift_types)
    @foreach ($shift_types as $shift_type)
    <option value="{{$shift_type->id}}">{{$shift_type->title}}</option>
    @endforeach
    @endif
</select>
