<div class="form-group  @if ($errors->has('association')) has-error @endif">
    <label class="control-label">Association</label>
    {{ Form::select('association', $associations, $old_association_id ? $old_association_id : null, ['id="association", class="form-control select2"']) }}

    @if($errors->has('association'))
        <span class="error invalid-feedback"> {!! $errors->first('association') !!} </span>
    @else
        <span class="help-block"> Association is required. </span>
    @endif
</div>
