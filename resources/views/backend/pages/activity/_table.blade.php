<section class="content">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">{{ $commons['content_title'] }}</h1>

            <div class="card-tools">
                Note:: [ You have to scroll Left => Right to see the full content ]
            </div>
        </div>
        <!-- /.card-header -->

        <div class="card-body p-0">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Council</th>
                        <th>Association</th>
                        <th>Program</th>

                        <th>Activity Title</th>
                        <th>Remarks</th>
                        <th>Venue</th>
                        <th>Start Date</th>
                        <th>End Date</th>

                        <th>Number of Trainers</th>
                        <th>Number of Trainees</th>


                        <th>Source of fund</th>
                        <th>Budget as per contract</th>
                        <th>Actual budget as per expenditure</th>
                        <th>Actual expenditure as per actual budget</th>


                        <th>Status</th>
                        <th>Created At</th>
                        <th>Created By</th>
                        <th>Updated At</th>
                        <th>Updated By</th>
                        <th class="custom_actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($activities as $row)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>

                        <td>{{ $row->getCouncil->name }}</td>
                        <td>{{ $row->getAssociation->name }}</td>
                        <td>{{ $row->getProgram->name }}</td>

                        <td>{{ $row->activity_title }}</td>
                        <td>{{ $row->remarks }}</td>
                        <td>{{ $row->venue }}</td>
                        <td>{{ $row->start_date }}</td>
                        <td>{{ $row->end_date }}</td>

                        <td><button class="btn btn-lg btn-outline-info">{{ $row->number_of_trainers }}</button></td>
                        <td><button class="btn btn-lg btn-outline-info">{{ $row->number_of_trainees }}</button></td>

                        <td>{{ isset($row->source_of_fund) ? $row->source_of_fund : 'NA' }}</td>
                        <td>{{ isset($row->budget_as_per_contract) ? $row->budget_as_per_contract : 'NA' }}</td>
                        <td>{{ isset($row->actual_budget_as_per_expenditure) ? $row->actual_budget_as_per_expenditure : 'NA' }}</td>
                        <td>{{ isset($row->actual_expenditure_as_per_actual_budget) ? $row->actual_expenditure_as_per_actual_budget : 'NA' }}</td>

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
                                <a href="{!! route('trainer.show', $row->id) !!}" class="btn btn-flat btn-outline-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{!! route('trainer.edit', $row->id) !!}" class="btn btn-flat btn-outline-info btn-sm" data-toggle="tooltip" title="Edit">
                                    <i class="far fa-edit"></i>
                                </a>
                                <form method="post" class="list_delete_form" action="{!! route('trainer.destroy', $row->id) !!}" accept-charset="UTF-8" >
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
            {!! $activities->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</section>
