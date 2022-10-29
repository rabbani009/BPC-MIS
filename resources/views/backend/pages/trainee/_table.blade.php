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
            <table class="table table-responsive text-center">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Council</th>
                        <th>Association</th>
                        <th>Program</th>
                        <th>Activity</th>
                        <th>Trainers</th>
                        <th class="_custom_actions">Trainee Details</th>

                        @include('backend.pages.commons.timestamps_th')

                        <th class="custom_actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($trainees as $row)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $row->getActivity->getCouncil->name ?? 'None' }}</td>
                        <td>{{ $row->getActivity->getAssociation->name ?? 'None' }}</td>
                        <td>{{ $row->getActivity->getProgram->name ?? 'None' }}</td>
                        <td>{{ $row->getActivity->activity_title ?? 'None' }}</td>
                        <td>
                            @foreach($row->getActivity->getTrainers as $trainer)
                                <span class="badge badge-info">{{ $trainer->getTrainer->name }}</span>
                            @endforeach
                        </td>
                        <td class="_custom_actions">
                            <div class="card text-center p-1">
                                <h5 class="">{{ $row->name }}</h5>
                                <span>{{ $row->phone }}</span>
                                <span>{{ $row->email }}</span>
                                <a class="btn btn-sm btn-outline-primary" data-toggle="collapse" href="#trainee{{$loop->iteration}}details" role="button" aria-expanded="false" aria-controls="trainee{{$loop->iteration}}details">
                                    More
                                </a>
                                <div class="collapse" id="trainee{{$loop->iteration}}details">
                                    <div class="card card-body">
                                        <span>{{ $row->gender }}</span>
                                        <span>{{ $row->qualification }}</span>
                                        <span>{{ $row->organization }}</span>
                                        <span>{{ $row->designation }}</span>
                                        <span>{{ $row->covid_status }}</span>
                                        <span> @foreach($row->attendance as $attendance)
                                            <p>
                                                {{ $attendance['day'] }}:
                                                <span class="badge {{ $attendance['status'] == 1 ? 'badge-success' : 'badge-danger' }}">
                                                {{ $attendance['status'] == 1 ? 'Present' : 'Not Present' }}
                                                </span>
                                            </p>
                                         @endforeach
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </td>

                        @include('backend.pages.commons.timestamps_td')

                        <td class="custom_actions">
                            <div class="btn-group">
                                <a href="{!! route('trainee.show', $row->id) !!}" class="btn btn-flat btn-outline-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                    <i class="far fa-eye"></i>
                                </a>
                    @if(auth()->user()->role->slug != 'bpc_admin')
                                <a href="{!! route('trainee.edit', $row->id) !!}" class="btn btn-flat btn-outline-info btn-sm" data-toggle="tooltip" title="Edit">
                                    <i class="far fa-edit"></i>
                                </a>
                                <form method="post" class="list_delete_form" action="{!! route('trainee.destroy', $row->id) !!}" accept-charset="UTF-8" >
                                    {!! csrf_field() !!}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-flat btn-outline-danger btn-sm" data-toggle="tooltip" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                    @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            {!! $trainees->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>

</section>
