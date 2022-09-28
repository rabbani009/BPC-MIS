<td>
    @if($row->status == 1)
        <span class="right badge badge-success">Active</span>
    @else
        <span class="right badge badge-danger">Inactive</span>
    @endif
</td>
<td>
    <a class="btn btn-sm btn-outline-primary" data-toggle="collapse" href="#timestamps{{$loop->iteration}}details" role="button" aria-expanded="false" aria-controls="trainee{{$loop->iteration}}details">
        Show
    </a>
    <div class="collapse" id="timestamps{{$loop->iteration}}details">
        <div class="card card-body">
            <span>Created At: {{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</span>
            <span>Created By: {{ isset($row->createdBy)? $row->createdBy->name : 'NA' }}</span>
            <span>Updated At: {{ \Carbon\Carbon::parse($row->updated_at)->diffForHumans() }}</span>
            <span>Updated By: {{ isset($row->updatedBy)? $row->updatedBy->name : 'NA' }}</span>
        </div>
    </div>
</td>

