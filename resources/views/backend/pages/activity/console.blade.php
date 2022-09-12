@extends('backend')

@section('page_level_css_plugins')

@endsection

@section('page_level_css_files')

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
                <!-- Prerequisites section -->
                <div class="container card ">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Council: {{ $activity->getCouncil->name }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="association_block">
                                <div class="form-group">
                                    <label class="control-label">Association: {{ $activity->getAssociation->name }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Program: {{ $activity->getProgram->name }}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Time and location section -->
                <div class="container card ">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Activity Title: {{ $activity->title }}</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Remarks: {{ $activity->remarks }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Start date: {{ $activity->start_date }}</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">End date: {{ $activity->end_date }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Venue: {{ $activity->venue }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Trainers: </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Trainees: </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fund -->
                <div class="container card ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Source of fund: {{ $activity->source_of_fund }}</label>
                            </div>
                            <div class="form-group">
                                <label for="">Budget as per contract: {{ $activity->budget_as_per_contact }}</label>
                            </div>
                            <div class="form-group">
                                <label for="">Actual budget as per expenditure: {{ $activity->actual_budget_as_per_expenditure }}</label>
                            </div>
                            <div class="form-group">
                                <label for="">Actual expenditure as per actual budget: {{ $activity->actual_expenditure_as_per_actual_budget }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
