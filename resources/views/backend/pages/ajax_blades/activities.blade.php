<div class="form-group  @if ($errors->has('activity')) has-error @endif">
    <label class="control-label">Activity *</label>
    <select name="activity" id="activity" class="form-control select2 @if($errors->has('activity')) is-invalid @endif">
        @foreach($activities as $activity)
            <option value="{!! $activity->id !!}" {{ isset($activity) && is_array($old_activity) && in_array($activity->id, $old_activity) ? 'selected' : '' }}>{!! $activity->name !!}</option>
        @endforeach
    </select>

    @if($errors->has('activity'))
        <span class="error invalid-feedback"> {!! $errors->first('activity') !!} </span>
    @endif
</div>


