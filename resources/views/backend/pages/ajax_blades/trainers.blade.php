<div class="form-group  @if ($errors->has('trainers')) has-error @endif">
    <label class="control-label">Trainers *</label>
    <select name="trainers[]" id="trainers" class="form-control select2 @if($errors->has('trainers')) is-invalid @endif" multiple>
        @foreach($trainers as $trainer)
            <option value="{!! $trainer->id !!}" {{ isset($old_trainers) && is_array($old_trainers) && in_array($trainer->id, $old_trainers) ? 'selected' : '' }}>{!! $trainer->name !!}</option>
        @endforeach
    </select>

    @if($errors->has('trainers'))
        <span class="error invalid-feedback"> {!! $errors->first('trainers') !!} </span>
    @endif
</div>


