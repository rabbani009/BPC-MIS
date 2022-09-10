@extends('backend')

@section('page_level_css_plugins')
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <link href="{{ asset('AdminLTE-3.2.0/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
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
                    Note::
                </div>
            </div>
            <form action="{{ route('activity.store') }}" method="post" data-bitwarden-watching="1" enctype="multipart/form-data" accept-charset="UTF-8">
                @csrf
                <div class="card-body">
                    <!-- Prerequisites section -->
                    <div class="container card ">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group  @if ($errors->has('council')) has-error @endif">
                                    <label class="control-label">Council</label>
                                    {{ Form::select('council', $councils, old('council')?old('council'):null, ['id="council", class="form-control select2"']) }}

                                    @if($errors->has('council'))
                                        <span class="error invalid-feedback"> {{ $errors->first('council') }} </span>
                                    @else
                                        <span class="help-block"> The type field is required. </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="association_block">
                                    <div class="form-group  @if ($errors->has('association')) has-error @endif">
                                        <label class="control-label">Association</label>
                                        {{ Form::select('association', $associations, old('association')?old('association'):null, ['id="association", class="form-control select2"']) }}

                                        @if($errors->has('association'))
                                            <span class="error invalid-feedback"> {!! $errors->first('association') !!} </span>
                                        @else
                                            <span class="help-block"> Association is required. </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group  @if ($errors->has('program')) has-error @endif">
                                    <label class="control-label">Program</label>
                                    {{ Form::select('program', $programs, old('program')?old('program'):null, ['id="program", class="form-control select2"']) }}

                                    @if($errors->has('program'))
                                        <span class="error invalid-feedback"> {{ $errors->first('program') }} </span>
                                    @else
                                        <span class="help-block"> Program is required. </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Time and location section -->
                    <div class="container card ">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Activity Title</label>
                                    <input type="text" name="activity_title" class="form-control @if($errors->has('activity_title')) is-invalid @endif" value="{{ old('activity_title') }}" placeholder="Enter activity Name">
                                    @if($errors->has('activity_title'))
                                        <span class="error invalid-feedback">{{ $errors->first('activity_title') }}</span>
                                    @else
                                        <span class="help-block"> This field is required. </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Remarks</label>
                                    <div class="d-flex h5">
                                        <div class="custom-control custom-radio pr-2">
                                            <input class="custom-control-input" value="0" type="radio" id="remarks_stats_1" name="remarks" checked>
                                            <label for="remarks_stats_1" class="custom-control-label">Ongoing</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" value="1" type="radio" id="remarks_stats_2" name="remarks">
                                            <label for="remarks_stats_2" class="custom-control-label">Done</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Start date</label>
                                    <div class="input-group date" id="start_date" data-target-input="nearest">
                                        <input value="{{ old('start_date') }}" type="text" name="start_date" class="form-control datetimepicker-input" data-target="#start_date" autocomplete="off" placeholder="YYYY-MM-DD">
                                        <div class="input-group-append" data-target="#start_date" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @if($errors->has('start_date'))
                                        <span class="error invalid-feedback">{{ $errors->first('start_date') }}</span>
                                    @else
                                        <span class="help-block"> Start Date is required. </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">End date</label>
                                    <div class="input-group date" id="end_date" data-target-input="nearest">
                                        <input type="text" name="end_date" value="{{ old('end_date') }}" class="form-control datetimepicker-input" data-target="#end_date" autocomplete="off" placeholder="YYYY-MM-DD">
                                        <div class="input-group-append" data-target="#end_date" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @if($errors->has('end_date'))
                                        <span class="error invalid-feedback">{{ $errors->first('end_date') }}</span>
                                    @else
                                        <span class="help-block"> End Date is required. </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Venue</label>
                                    <input type="text" name="venue" class="form-control @if($errors->has('venue')) is-invalid @endif" value="{{ old('venue') }}" placeholder="Enter Venue information here">
                                    @if($errors->has('venue'))
                                        <span class="error invalid-feedback">{{ $errors->first('venue') }}</span>
                                    @else
                                        <span class="help-block"> Venue is required. </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div id="trainers_block">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Number of Trainees</label>
                                    <input type="number" name="number_of_trainees" required class="form-control @if($errors->has('number_of_trainees')) is-invalid @endif" value="{{ old('number_of_trainees') }}" placeholder="Enter number of trainees here">
                                    @if($errors->has('number_of_trainees'))
                                        <span class="error invalid-feedback">{{ $errors->first('number_of_trainees') }}</span>
                                    @else
                                        <span class="help-block"> This field is required. </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Fund -->
                    <div class="container card ">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Source of fund</label>
                                    <input type="text" name="source_of_fund" class="form-control @if($errors->has('source_of_fund')) is-invalid @endif" value="{{ old('source_of_fund') }}" placeholder="Enter source of fund amount here">
                                    @if($errors->has('source_of_fund'))
                                        <span class="error invalid-feedback">{{ $errors->first('source_of_fund') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Budget as per contract</label>
                                    <input type="number" min="1" name="budget_as_per_contract" class="form-control @if($errors->has('budget_as_per_contract')) is-invalid @endif" value="{{ old('budget_as_per_contract') }}" placeholder="Enter budget as per expenditure here">
                                    @if($errors->has('budget_as_per_contract'))
                                        <span class="error invalid-feedback">{{ $errors->first('budget_as_per_contract') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Actual budget as per expenditure</label>
                                    <input type="number" min="1" name="actual_budget_as_per_expenditure" class="form-control @if($errors->has('actual_budget_as_per_expenditure')) is-invalid @endif" value="{{ old('actual_budget_as_per_expenditure') }}" placeholder="Enter actual budget as per expenditure here">
                                    @if($errors->has('actual_budget_as_per_expenditure'))
                                        <span class="error invalid-feedback">{{ $errors->first('actual_budget_as_per_expenditure') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Actual expenditure as per actual budget</label>
                                    <input type="number" min="1" name="actual_expenditure_as_per_actual_budget" class="form-control @if($errors->has('actual_expenditure_as_per_actual_budget')) is-invalid @endif" value="{{ old('actual_expenditure_as_per_actual_budget') }}" placeholder="Enter actual expenditure as per actual budget here">
                                    @if($errors->has('actual_expenditure_as_per_actual_budget'))
                                        <span class="error invalid-feedback">{{ $errors->first('actual_expenditure_as_per_actual_budget') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <input type="hidden" id="old_association_id" value="{{old('association')}}">
            </form>
        </div>

    </section>

@endsection


<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')
    <script src="{{ asset('AdminLTE-3.2.0/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
@endsection
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_js_scripts')
    <script>
        /// Event loading...
        $( document ).ready(function() {
            $('#council').select2();
            $("#area_of_expertise").select2({
                tags: true,
                tokenSeparators: [',']
            });
            $("#program").select2();

            $(function () {
                $('#start_date').datetimepicker({
                    default: true,
                    format: 'L',
                    locale: 'BST',
                    format: 'YYYY-MM-DD'
                });
                $('#end_date').datetimepicker({
                    default: true,
                    format: 'L',
                    locale: 'BST',
                    format: 'YYYY-MM-DD',
                    placeholder: 'Select End Date'
                });
            });

            /// on load ajax 1.
            $.ajax({
                type:'POST',
                url:"{{ route('ajax.get-associations-by-council') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                data: {council_id: $('#council').val(), old_association_id: $('#old_association_id').val()},
                success:function(html){
                    $("#association_block").html(html);
                    $('#association').select2();

                    /// on load ajax 2.
                    $.ajax({
                        type:'POST',
                        url:"{{ route('ajax.get-trainers-by-council-and-association') }}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                        data: {council_id: $('#council').val(), association_id: $('#association').val()},
                        success:function(html){
                            $("#trainers_block").html(html);
                            $('#trainers').select2();
                            $('#trainers').select2({
                                placeholder: "Click to select trainers",
                            });

                            /// on load ajax 3.
                            $('#association').on('change', function (e) {
                                e.preventDefault();
                                $.ajax({
                                    type:'POST',
                                    url:"{{ route('ajax.get-trainers-by-association') }}",
                                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                                    data: {association_id: $('#association').val()},
                                    success:function(html){
                                        $("#trainers_block").html(html);
                                        $('#trainers').select2({
                                            placeholder: "Click to select trainers",
                                        });
                                    }
                                });
                            });
                        }
                    });
                }
            });
        });

        ///Event 1.
        $('#council').on('change', function (e) {
            e.preventDefault();
            ///event 1. > ajax 1.
            $.ajax({
                type:'POST',
                url:"{{ route('ajax.get-associations-by-council') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                data: {council_id: $('#council').val()},
                success:function(html){
                    console.log('loading on load..');
                    $("#association_block").html(html);
                    $('#association').select2();

                    ///event 1. > ajax 2.
                    $.ajax({
                        type:'POST',
                        url:"{{ route('ajax.get-trainers-by-council-and-association') }}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                        data: {council_id: $('#council').val(), association_id: $('#association').val()},
                        success:function(html){
                            $("#trainers_block").html(html);
                            $('#trainers').select2({
                                placeholder: "Click to select trainers",
                            });

                            ///event 1. > ajax 3.
                            $('#association').on('change', function (e) {
                                e.preventDefault();
                                $.ajax({
                                    type:'POST',
                                    url:"{{ route('ajax.get-trainers-by-association') }}",
                                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                                    data: {association_id: $('#association').val()},
                                    success:function(html){
                                        console.log('loading on load..');
                                        $("#trainers_block").html(html);
                                        $('#trainers').select2({
                                            placeholder: "Click to select trainers",
                                        });
                                    }
                                });
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
