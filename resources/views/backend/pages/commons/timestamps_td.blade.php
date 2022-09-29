<td>
    @if($row->status == 1)
        <span class="right badge badge-success">Active</span>
    @else
        <span class="right badge badge-danger">Inactive</span>
    @endif
</td>
<td>
    <button type="button" class="btn btn-flat btn-sm btn-outline-primary custom_btn" data-toggle="collapse" href="#timestamps{{$loop->iteration}}details" role="button" aria-expanded="false" aria-controls="trainee{{$loop->iteration}}details">
        <i class="fa fas fa-clock pr-2" aria-hidden="true"></i>User
    </button>
    <div class="collapse" id="timestamps{{$loop->iteration}}details">
        <div class="card card-body timestamps_collapse_body">
            <span>Created At: {{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</span>
            <span>Created By: {{ isset($row->createdBy)? $row->createdBy->name : 'NA' }}</span>
            <span>Updated At: {{ \Carbon\Carbon::parse($row->updated_at)->diffForHumans() }}</span>
            <span>Updated By: {{ isset($row->updatedBy)? $row->updatedBy->name : 'NA' }}</span>
        </div>
    </div>
</td>

