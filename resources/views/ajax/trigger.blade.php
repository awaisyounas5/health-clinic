<select class="form-control" name="possible_trigger" id="possible_trigger" required>
    <option value="" disabled selected>Please Select</option>
    @if ($triggers)
        @foreach ($triggers as $trigger)
            <option value="{{ $trigger->title }}">{{ $trigger->title }}</option>
        @endforeach
    @endif

</select>
