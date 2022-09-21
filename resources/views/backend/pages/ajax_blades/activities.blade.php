{{ Form::select('activity', $activities, isset($old_activity_id) ? $old_activity_id : null, ['id="activity", class="form-control select2"']) }}
