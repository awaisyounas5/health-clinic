<select class="form-control" name="type_of_incidents" id="incident_types" required>
    <option value="" disabled selected>Please Select</option>
    @if ($incident_types)
        @foreach ($incident_types as $incident_type)
            <option value="{{ $incident_type->title }}">{{ $incident_type->title }}</option>
        @endforeach
    @endif
</select>
