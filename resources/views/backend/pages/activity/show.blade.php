@extends('backend')

@section('page_level_css_plugins')

@endsection

@section('page_level_css_files')
    <style>

    </style>
@endsection

@section('content')
    <section class="content">
        @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">{{ $commons['content_title'] }}</h1>

                <div class="card-tools">
                    Note:: * marked fields are required
                </div>
            </div>

            <div class="card-body">
                <table class="table table-striped table-responsive">
                    <tr>
                        <td colspan="5"><strong>Activity Title: </strong>{{ $activity->activity_title }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>Program: </strong>{{ $activity->getProgram->name }}</td>
                        <td colspan="3"><strong>Venue: </strong>{{ $activity->venue }}</td>
                    </tr>
                    <tr>
                        <td><strong>Remarks: </strong>{{ $activity->remarks }}</td>
                        <td><strong>Start Date: </strong>{{ $activity->start_date }}</td>
                        <td><strong>End Date: </strong>{{ $activity->end_date }}</td>
                        <td><strong>Trainers: </strong>{{ $activity->venue }}</td>
                        <td><strong>Trainees: </strong>{{ $activity->venue }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>Council: </strong>{{ $activity->getCouncil->name }}</td>
                        <td colspan="3"><strong>Association: </strong>{{ $activity->getAssociation->name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Source of fund: </strong>{{ $activity->source_of_fund }}</td>
                        <td><strong>Budget as per contract: </strong>{{ $activity->budget_as_per_contact }}</td>
                        <td><strong>Actual budget as per expenditure: </strong>{{ $activity->actual_budget_as_per_expenditure }}</td>
                        <td colspan="2"><strong>Actual expenditure as per actual budget: </strong>{{ $activity->actual_expenditure_as_per_actual_budget }}</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-center">
                            <span>
                                Here are ({{$activity->number_of_trainees}}) of trainees information
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <table class="table table-striped table-responsive">
                                <tr>
                                    <th style="width: 5%">SN.</th>
                                    <th>Trainee Info</th>
                                    <th>Attendance Status</th>
                                </tr>
                                @if($activity->getTrainees)
                                    @foreach($activity->getTrainees as $trainee)
                                    <tr>
                                        <td style="width: 5%">{{$loop->iteration}}.</td>
                                        <td>
                                            <p><strong>Name: </strong>{{$trainee->name}}</p>
                                            <p><strong>Age: </strong>{{$trainee->age}}</p>
                                            <p><strong>Gender: </strong>{{$trainee->gender}}</p>
                                            <p><strong>Qualification: </strong>{{$trainee->qualification}}</p>
                                            <p><strong>Organization: </strong>{{$trainee->organization}}</p>
                                            <p><strong>Designation: </strong>{{$trainee->designation}}</p>
                                            <p><strong>Phone: </strong>{{$trainee->phone}}</p>
                                            <p><strong>Email: </strong>{{$trainee->email}}</p>
                                            <p><strong>Covid Status: </strong>{{$trainee->covid_status}}</p>
                                        </td>
                                        <td>
                                           @foreach($trainee->attendance as $attendance)
                                               <p>
                                                   {{ $attendance['day'] }}:
                                                   <span class="badge {{ $attendance['status'] == 1 ? 'badge-success' : 'badge-danger' }}">
                                                   {{ $attendance['status'] == 1 ? 'Present' : 'Not Present' }}
                                                   </span>
                                               </p>
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif

                            </table>
                        </td>
                    </tr>
                </table>

            </div>
        </div>

    </section>

@endsection


<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')

@endsection
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_js_scripts')

@endsection
