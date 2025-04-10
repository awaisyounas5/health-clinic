<select class="form-control" name="position" id="position" required>
    <option value="" disabled selected>Please Select</option>
    @if($positions)
    @foreach ($positions as $position)
    <option value="{{$position->title}}">{{$position->title}}</option>
    @endforeach
    @endif
</select>
