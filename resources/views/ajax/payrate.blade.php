<select class="form-control" id="pay_rate" name="payrate_id" required>
    <option value="" selected disabled>Choose Staff Pay Rate</option>
    @if($payrates)
    @foreach ($payrates as $payrate)
    <option value="{{$payrate->id}}">{{$payrate->title}} </option>
    @endforeach
    @endif
</select>
