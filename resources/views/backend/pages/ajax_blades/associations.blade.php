<div class="form-group  @if ($errors->has('association')) has-error @endif">
    <label class="control-label">Association</label>
    <select name="association" id="association" class="form-control select2 @if($errors->has('association')) is-invalid @endif">
        @foreach($associations as $association)
            <option value="{!! $association->id !!}" @if(old('association') == $association->id) {!! 'selected' !!} @endif>{!! $association->name !!}</option>
        @endforeach
    </select>

    @if($errors->has('association'))
        <span class="error invalid-feedback"> {!! $errors->first('association') !!} </span>
    @else
        <span class="help-block"> The type field is required. </span>
    @endif
</div>
