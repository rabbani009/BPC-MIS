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
                <table class="table table-striped table-bordered table-responsive">
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
                        <td><strong>Trainers: </strong>
                            @foreach($activity->getTrainers as $trainer)
                                <span class="badge badge-info">{{ $trainer->gettrainer->name }}</span>
                            @endforeach
                        </td>
                        <td><strong>Trainees: </strong><span class="badge badge-info">{{ $activity->number_of_trainees }}</span></td>
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
                                Please use below form to insert trainees ({{$activity->number_of_trainees}}) information
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            @include('backend.pages.activity.trainee_form')
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
