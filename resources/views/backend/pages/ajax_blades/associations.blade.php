{{ Form::select('association', $associations, isset($old_association_id) ? $old_association_id : null, ['id="association", class="form-control select2"']) }}
