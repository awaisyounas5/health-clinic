<select class="form-control" name="action_plans" id="action_plans" required>
    <option value="" disabled selected>Please Select</option>
    @if ($action_plans)
        @foreach ($action_plans as $action_plan)
            <option value="{{ $action_plan->title }}">{{ $action_plan->title }}</option>
        @endforeach
    @endif
</select>
