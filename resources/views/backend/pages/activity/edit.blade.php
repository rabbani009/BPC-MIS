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
            <div class="card pl-3 bg-danger">
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">{{ $commons['content_title'] }}</h1>

                <div class="card-tools">
                    Note:: * marked fields are required
                </div>
            </div>
            <form action="{{ route('activity.store') }}" method="post" data-bitwarden-watching="1" enctype="multipart/form-data" accept-charset="UTF-8">
                @csrf
                <div class="card-body">
                    <!-- Prerequisites section -->
                    <div class="container-fluid card ">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group  @if ($errors->has('council')) has-error @endif">
                                    <label class="control-label">Council</label>
                                    <select name="council" id="council" class="form-control select2 @if($errors->has('council')) is-invalid @endif">
                                        @foreach($councils as $council)
                                            <option value="{{ $council->id }}" @if($activity->getCouncil->id == $council->id) {{ 'selected' }} @endif>{{ $council->name }}</option>
                                        @endforeach
                                    </select>
            
                                    @if($errors->has('council'))
                                        <span class="error invalid-feedback"> {{ $errors->first('council') }} </span>
                                    @else
                                        <span class="help-block"> The type field is required. </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group  @if ($errors->has('association')) has-error @endif">
                                    <label class="control-label">Association *</label>
                                    <div id="association_block">

                                        {{ Form::select('association', $associations, old('association')?old('association'):null, ['id="association", class="form-control select2"']) }}

                                    {{-- <select name="association" class="form-control select2  " required="" id="association" >
                                    
                                            <option value="" selected="" disabled="">Select Association</option>
                                                    @foreach($associations as $association)
                                            <option value="{{ $association->name }}" {{ $association->id == $activity->association ? 'selected': '' }} >{{ $association->name }}</option>	
                                                    @endforeach
    
                                    </select> --}}



                                    </div>
                                    @if($errors->has('association'))
                                        <span class="error invalid-feedback"> {{ $errors->first('association') }} </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group  @if ($errors->has('program')) has-error @endif">
                                    <label class="control-label">Program</label>
                                    <select name="program" id="program" class="form-control select2 @if($errors->has('program')) is-invalid @endif">
                                        @foreach($programs as $program)
                                            <option value="{{ $program->id }}" @if($activity->getProgram->id == $program->id) {{ 'selected' }} @endif>{{ $program->name }}</option>
                                        @endforeach
                                    </select>
            
                                    @if($errors->has('council'))
                                        <span class="error invalid-feedback"> {{ $errors->first('council') }} </span>
                                    @else
                                        <span class="help-block"> The type field is required. </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Time and location section -->
                    <div class="container-fluid card ">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group @if ($errors->has('activity_title')) has-error @endif">
                                    <label for="">Activity Title *</label>
                                    <input type="text" name="activity_title" class="form-control @if($errors->has('activity_title')) is-invalid @endif" value="{{ $activity->activity_title }}" placeholder="Enter activity Name">
                                    @if($errors->has('activity_title'))
                                        <span class="error invalid-feedback">{{ $errors->first('activity_title') }}</span>
                                    @else
                                        <span class="help-block"> This field is required. </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group @if ($errors->has('remarks')) has-error @endif">
                                    <label for="">Remarks *</label>
                                    <div class="d-flex h5">
                                        <div class="custom-control custom-radio pr-2">
                                            <input class="custom-control-input" value="0" type="radio" id="remarks_stats_1" name="remarks"  @if($activity->remarks == false) checked="checked" @endif>
                                            <label for="remarks_stats_1" class="custom-control-label">Ongoing</label>

                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" value="1" type="radio" id="remarks_stats_2" name="remarks"@if($activity->remarks == true) checked="checked" @endif>
                                            <label for="remarks_stats_2" class="custom-control-label" >Done</label>
                                        </div>
                                    </div>
                                    @if($errors->has('remarks'))
                                        <span class="error invalid-feedback">{{ $errors->first('remarks') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group @if ($errors->has('start_date')) has-error @endif">
                                    <label for="">Start date *</label>
                                    <div class="input-group date" id="start_date" data-target-input="nearest">
                                        <input value="{{ $activity->start_date }}" type="text" name="start_date" class="form-control datetimepicker-input" data-target="#start_date" autocomplete="off" placeholder="YYYY-MM-DD">
                                        <div class="input-group-append" data-target="#start_date" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @if($errors->has('start_date'))
                                        <span class="error invalid-feedback">{{ $errors->first('start_date') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @if ($errors->has('end_date')) has-error @endif">
                                    <label for="">End date *</label>
                                    <div class="input-group date" id="end_date" data-target-input="nearest">
                                        <input type="text" name="end_date" value="{{ $activity->end_date }}" class="form-control datetimepicker-input" data-target="#end_date" autocomplete="off" placeholder="YYYY-MM-DD">
                                        <div class="input-group-append" data-target="#end_date" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @if($errors->has('end_date'))
                                        <span class="error invalid-feedback">{{ $errors->first('end_date') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @if ($errors->has('venue')) has-error @endif">
                                    <label for="">Venue</label>
                                    <input type="text" name="venue" class="form-control @if($errors->has('venue')) is-invalid @endif" value="{{ $activity->venue }}" placeholder="Enter Venue information here">
                                    @if($errors->has('venue'))
                                        <span class="error invalid-feedback">{{ $errors->first('venue') }}</span>
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
                                <div class="form-group @if ($errors->has('number_of_trainees')) has-error @endif">
                                    <label for="">Number of Trainees *</label>
                                    <input type="number" name="number_of_trainees" required class="form-control @if($errors->has('number_of_trainees')) is-invalid @endif" value="{{ $activity->number_of_trainees }}" placeholder="Enter number of trainees here">
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
                    <div class="container-fluid card ">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group @if ($errors->has('source_of_fund')) has-error @endif">
                                    <label for="">Source of fund</label>
                                    <input type="text" name="source_of_fund" class="form-control @if($errors->has('source_of_fund')) is-invalid @endif" value="{{ $activity->source_of_fund }}" placeholder="Enter source of fund amount here">
                                    @if($errors->has('source_of_fund'))
                                        <span class="error invalid-feedback">{{ $errors->first('source_of_fund') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @if ($errors->has('budget_as_per_contract')) has-error @endif">
                                    <label for="">Budget as per contract</label>
                                    <input type="number" min="1" name="budget_as_per_contract" class="form-control @if($errors->has('budget_as_per_contract')) is-invalid @endif" value="{{ $activity->budget_as_per_contract }}" placeholder="Enter budget as per expenditure here">
                                    @if($errors->has('budget_as_per_contract'))
                                        <span class="error invalid-feedback">{{ $errors->first('budget_as_per_contract') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group @if ($errors->has('actual_budget_as_per_expenditure')) has-error @endif">
                                    <label for="">Actual budget as per expenditure</label>
                                    <input type="number" min="1" name="actual_budget_as_per_expenditure" class="form-control @if($errors->has('actual_budget_as_per_expenditure')) is-invalid @endif" value="{{ $activity->actual_budget_as_per_expenditure }}" placeholder="Enter actual budget as per expenditure here">
                                    @if($errors->has('actual_budget_as_per_expenditure'))
                                        <span class="error invalid-feedback">{{ $errors->first('actual_budget_as_per_expenditure') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group @if ($errors->has('actual_expenditure_as_per_actual_budget')) has-error @endif">
                                    <label for="">Actual expenditure as per actual budget</label>
                                    <input type="number" min="1" name="actual_expenditure_as_per_actual_budget" class="form-control @if($errors->has('actual_expenditure_as_per_actual_budget')) is-invalid @endif" value="{{ $activity->actual_expenditure_as_per_actual_budget }}" placeholder="Enter actual expenditure as per actual budget here">
                                    @if($errors->has('actual_expenditure_as_per_actual_budget'))
                                        <span class="error invalid-feedback">{{ $errors->first('actual_expenditure_as_per_actual_budget') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Activity</button>
                </div>
                <input type="hidden" id="" value="{{old('association')}}">
                @if((old('trainers') !== '') && is_array(old('trainers')))
                <input type="hidden" id="old_trainers" value="{{ implode(", ",old('trainers')) }}">
                @endif
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
                    data: {council_id: $('#council').val(), association_id: $('#association').val(), old_trainers: $('#old_trainers').val()},
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
