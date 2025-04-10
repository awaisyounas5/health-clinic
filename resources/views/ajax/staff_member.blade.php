<select class="form-control" id="staff_id" name="staff_id" required>
    <option value="" selected disabled>Please Choose Staff</option>
    @if($staffs)
    @foreach ($staffs as $staff)
    <option value="{{$staff->id}}">{{$staff->name}} {{$staff->surname}}</option>
    @endforeach
    @endif
</select>
