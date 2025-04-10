<select class="form-control" name="results_of_investigation" id="results_of_investigation" required>
    <option value="" disabled selected>Please Select</option>
    @if ($results)
            @foreach ($results as $result)
                <option value="{{ $result->title }}">{{ $result->title }}</option>
            @endforeach
        @endif
</select>
