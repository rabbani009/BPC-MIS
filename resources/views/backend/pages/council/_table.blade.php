<section class="content">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">{{ $commons['content_title'] }}</h1>

            <div class="card-tools">
                Note::
            </div>
        </div>
        <!-- /.card-header -->

        <div class="card-body p-0">
            <table class="table table-responsive-md">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Created By</th>
                        <th>Updated At</th>
                        <th>Updated By</th>
                        <th class="custom_actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($councils as $row)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $row->name }}</td>
                        <td>
                            @if($row->status == 1)
                                <span class="right badge badge-success">Active</span>
                            @else
                                <span class="right badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</td>
                        <td>{{ isset($row->createdBy)? $row->createdBy->name : 'NA' }}</td>
                        <td>{{ \Carbon\Carbon::parse($row->updated_at)->diffForHumans() }}</td>
                        <td>{{ isset($row->updatedBy)? $row->updatedBy->name : 'NA' }}</td>
                        <td class="custom_actions">
                            <div class="btn-group">
                                <a href="{!! route('council.show', $row->id) !!}" class="btn btn-flat btn-outline-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{!! route('council.edit', $row->id) !!}" class="btn btn-flat btn-outline-info btn-sm" data-toggle="tooltip" title="Edit">
                                    <i class="far fa-edit"></i>
                                </a>
                                <form method="post" class="list_delete_form" action="{!! route('council.destroy', $row->id) !!}" accept-charset="UTF-8" >
                                    {!! csrf_field() !!}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-flat btn-outline-danger btn-sm" data-toggle="tooltip" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            {!! $councils->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>

</section>
