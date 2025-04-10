<select class="form-control" name="recommendations" id="recommendations" required>
    <option value="" disabled selected>Please Select</option>
    @if ($recommendations)
        @foreach ($recommendations as $recommendation)
            <option value="{{$recommendation->title}}">{{$recommendation->title}}</option>
        @endforeach
    @endif
</select>
