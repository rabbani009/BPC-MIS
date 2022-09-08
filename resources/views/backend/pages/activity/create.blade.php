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
                    <div class="container card bg-info">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group  @if ($errors->has('council')) has-error @endif">
                                    <label class="control-label">Council</label>
                                    <select name="council" id="council" class="form-control select2 @if($errors->has('council')) is-invalid @endif">
                                        @foreach($councils as $council)
                                            <option value="{{ $council->id }}" @if(old('type') == $council->id) {{ 'selected' }} @endif>{{ $council->name }}</option>
                                        @endforeach
                                    </select>

                                    @if($errors->has('council'))
                                        <span class="error invalid-feedback"> {{ $errors->first('council') }} </span>
                                    @else
                                        <span class="help-block"> The type field is required. </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div id="association_block">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div id="trainers_block">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group  @if ($errors->has('program')) has-error @endif">
                                    <label class="control-label">Program</label>
                                    <select name="program" id="program" class="form-control select2 @if($errors->has('program')) is-invalid @endif">
                                        @foreach($programs as $program)
                                            <option value="{{ $program->id }}" @if(old('program') == $program->id) {{ 'selected' }} @endif>{{ $program->name }}</option>
                                        @endforeach
                                    </select>

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
                    <div class="container card">
                        <div class="row">
                            <div class="col-md-12">
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
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Start date</label>
                                    <div class="input-group date" id="start_date" data-target-input="nearest">
                                        <input type="text" name="start_date" class="form-control datetimepicker-input" data-target="#start_date" autocomplete="off">
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
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
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">End date</label>
                                    <input type="date" name="end_date" class="form-control @if($errors->has('end_date')) is-invalid @endif" value="{{ old('end_date') }}" placeholder="DD/MM/YYYY">
                                    @if($errors->has('end_date'))
                                        <span class="error invalid-feedback">{{ $errors->first('end_date') }}</span>
                                    @else
                                        <span class="help-block"> End Date is required. </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-8">
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
                    </div>

                    <div class="container card">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group  @if ($errors->has('program')) has-error @endif">
                                    <label class="control-label">Program</label>
                                    <select name="program" id="program" class="form-control select2 @if($errors->has('program')) is-invalid @endif">
                                        @foreach($programs as $program)
                                            <option value="{{ $program->id }}" @if(old('program') == $program->id) {{ 'selected' }} @endif>{{ $program->name }}</option>
                                        @endforeach
                                    </select>

                                    @if($errors->has('program'))
                                        <span class="error invalid-feedback"> {{ $errors->first('program') }} </span>
                                    @else
                                        <span class="help-block"> Program is required. </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="">Gender</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="male" type="radio" id="customRadio1" name="gender" checked>
                            <label for="customRadio1" class="custom-control-label">Male</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="female" type="radio" id="customRadio2" name="gender">
                            <label for="customRadio2" class="custom-control-label">Female</label>
                        </div>
                        @if($errors->has('status'))
                            <span class="error invalid-feedback">{{ $errors->first('status') }}</span>
                        @endif
                    </div>

                    <div class="form-group  @if ($errors->has('area_of_expertise')) has-error @endif">
                        <label class="control-label">Area of Expertise (Please type the area of expertise below and hit enter)</label>
                        <select name="area_of_expertise[]" id="area_of_expertise" class="form-control" multiple="multiple" >

                        </select>

                        @if($errors->has('area_of_expertise'))
                            <span class="error invalid-feedback"> {{ $errors->first('area_of_expertise') }} </span>
                        @endif
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </section>

    @include('backend.pages.activity._table')
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
                    locale: 'ru'
                });
            });

            /// on load ajax 1.
            $.ajax({
                type:'POST',
                url:"{{ route('ajax.get-associations-by-council') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                data: {council_id: $('#council').val()},
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
