@extends('backend')

@section('page_level_css_plugins')
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
            <form action="{{ route('trainee.store') }}" method="post" data-bitwarden-watching="1" enctype="multipart/form-data" accept-charset="UTF-8">
                @csrf
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group  @if ($errors->has('council')) has-error @endif">
                                        <label class="control-label">Council *</label>
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
                                <div class="col-md-6">
                                    <div class="form-group  @if ($errors->has('association')) has-error @endif">
                                        <label class="control-label">Association *</label>
                                        <div id="association_block">
                                            {{ Form::select('association', $associations, old('association')?old('association'):null, ['id="association", class="form-control select2"']) }}
                                        </div>
                                        @if($errors->has('association'))
                                            <span class="error invalid-feedback"> {{ $errors->first('association') }} </span>
                                        @else
                                            <span class="help-block"> The type field is required. </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group  @if ($errors->has('activity')) has-error @endif">
                                        <label class="control-label">Activity *</label>
                                        <div id="activity_block">
                                            {{ Form::select('activity', $activities, old('activity') ? old('activity') : null, ['id="activity", class="form-control select2"']) }}
                                        </div>
                                        @if($errors->has('activity'))
                                            <span class="error invalid-feedback"> {{ $errors->first('activity') }} </span>
                                        @else
                                            <span class="help-block"> The type field is required. </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" value="{{ old('name') }}" placeholder="Enter trainee Name">
                                        @if($errors->has('name'))
                                            <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                        @else
                                            <span class="help-block"> This field is required. </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input type="text" name="age" class="form-control @if($errors->has('age')) is-invalid @endif" value="{{ old('age') }}" placeholder="Enter trainee age">
                                        @if($errors->has('age'))
                                            <span class="error invalid-feedback">{{ $errors->first('age') }}</span>
                                        @else
                                            <span class="help-block"> This field is required. </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="age">Phone</label>
                                        <input type="text" name="phone" class="form-control @if($errors->has('phone')) is-invalid @endif" value="{{ old('phone') }}" placeholder="Enter trainee phone">
                                        @if($errors->has('phone'))
                                            <span class="error invalid-feedback">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                    <span class="help-block"> This field is required. </span>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" value="{{ old('email') }}" placeholder="Enter trainee email">
                                        @if($errors->has('email'))
                                            <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                        @else
                                            <span class="help-block"> This field is required. </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Gender</label>
                                        <div class="custom-radio">
                                            <label class="radio-inline"> <input type="radio" name="gender" id="seasonSummer" value="male" checked> Male </label>
                                            <label class="radio-inline"> <input type="radio" name="gender" id="seasonWinter" value="female"> Female </label>
                                        </div>
                                        @if($errors->has('gender'))
                                            <span class="error invalid-feedback">{{ $errors->first('gender') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label">Covid Status</label>
                                        <div class="custom-radio">
                                            <label class="radio-inline"> <input type="radio" name="covid_status" id="seasonSummer" value="registered" checked> Registered </label>
                                            <label class="radio-inline"> <input type="radio" name="covid_status" id="seasonWinter" value="not_registered"> Not Registered </label>
                                            <label class="radio-inline"> <input type="radio" name="covid_status" id="seasonSpringFall" value="dose_1"> Dose 1 </label>
                                            <label class="radio-inline"> <input type="radio" name="covid_status" id="seasonSpringFall" value="dose_2"> Dose 2 </label>
                                        </div>
                                        @if($errors->has('covid_status'))
                                            <span class="error invalid-feedback">{{ $errors->first('covid_status') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="qualification">Qualification</label>
                                        <input type="text" name="qualification" class="form-control @if($errors->has('qualification')) is-invalid @endif" value="{{ old('qualification') }}" placeholder="Enter trainee qualification">
                                        @if($errors->has('qualification'))
                                            <span class="error invalid-feedback">{{ $errors->first('qualification') }}</span>
                                        @else
                                            <span class="help-block"> This field is required. </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="organization">Organization</label>
                                        <input type="text" name="organization" class="form-control @if($errors->has('organization')) is-invalid @endif" value="{{ old('organization') }}" placeholder="Enter trainee organization">
                                        @if($errors->has('organization'))
                                            <span class="error invalid-feedback">{{ $errors->first('organization') }}</span>
                                        @else
                                            <span class="help-block"> This field is required. </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="designation">Designation</label>
                                        <input type="text" name="designation" class="form-control @if($errors->has('designation')) is-invalid @endif" value="{{ old('designation') }}" placeholder="Enter trainee designation">
                                        @if($errors->has('designation'))
                                            <span class="error invalid-feedback">{{ $errors->first('designation') }}</span>
                                        @else
                                            <span class="help-block"> This field is required. </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="attendance">Attendance</label>
                                    <div id="attendance_block">
                                        <table class="table table-bordered text-center">
                                            @php($activity_duration = 5)
                                            @if($activity_duration > 0)
                                                <tr>
                                                    <!-- in this loop -1 for get the exact days from activity duration-->
                                                    @for($j = 1; $j <= ($activity_duration); $j++)
                                                        <th>Day {{$j}}</th>
                                                    @endfor
                                                </tr>
                                                <tr>
                                                    <!-- in this loop -1 for get the exact days from activity duration-->
                                                    @for($j = 1; $j <= ($activity_duration); $j++)
                                                        <td>
                                                            <input type="checkbox" id="day_{{$j}}_attend" name="day_{{$j}}_attend" value="1" {{ $j == 1 ? 'checked' : ''  }}>
                                                            <label for="day_{{$j}}_attend"> Attended</label><br>
                                                        </td>
                                                    @endfor
                                                </tr>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </section>

    @include('backend.pages.trainee._table')
@endsection


<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_js_scripts')
    <script>
        /// Event loading...
        $( document ).ready(function() {
            $('#council').select2({
                placeholder: "Click to select council",
            });
            $('#association').select2({
                placeholder: "Click to select association",
            });
            $('#activity').select2({
                placeholder: "Click to select activity",
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
                        url:"{{ route('ajax.get-activities-by-council-and-association') }}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                        data: {council_id: $('#council').val(), association_id: $('#association').val()},
                        success:function(html){
                            $("#activity_block").html(html);
                            $('#activity').select2({
                                placeholder: "Click to select Activity",
                            });
                            alert('1')
                            /// on load ajax 3.
                            $('#association').on('change', function (e) {
                                e.preventDefault();
                                $.ajax({
                                    type:'POST',
                                    url:"{{ route('ajax.get-activities-by-council-and-association') }}",
                                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                                    data: {association_id: $('#association').val()},
                                    success:function(html){
                                        $("#activity_block").html(html);
                                        $('#activity').select2({
                                            placeholder: "Click to select Activity",
                                        });
                                        alert('2')
                                        // get number of program days against acticvity
                                        $('#activity').on('change', function (e) {
                                            alert('onload')
                                            e.preventDefault();
                                            $.ajax({
                                                type:'POST',
                                                url:"{{ route('ajax.get-activities-by-council-and-association') }}",
                                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                                                data: {activity_id: $('#activity').val()},
                                                success:function(html){
                                                    $("#activity_block").html(html);
                                                    $('#activity').select2({
                                                        placeholder: "Click to select Activity",
                                                    });
                                                }
                                            });
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
                    $("#association_block").html(html);
                    $('#association').select2();
                    $.ajax({
                        type:'POST',
                        url:"{{ route('ajax.get-activities-by-council-and-association') }}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                        data: {council_id: $('#council').val(), association_id: $('#association').val()},
                        success:function(html){
                            $("#activity_block").html(html);
                            $('#activity').select2({
                                placeholder: "Click to select Activity",
                            });
                        }
                    });
                }
            });
        });

        ///event 1. > ajax 3.
        $('#association').on('change', function (e) {
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:"{{ route('ajax.get-activities-by-council-and-association') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                data: {association_id: $('#association').val()},
                success:function(html){
                    $("#activity_block").html(html);
                    $('#activity').select2({
                        placeholder: "Click to select Activity",
                    });
                }
            });
        });

        $('#activity').on('load', function (e) {
            alert('onload')
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:"{{ route('ajax.get-activities-by-council-and-association') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                data: {activity_id: $('#activity').val()},
                success:function(html){
                    $("#activity_block").html(html);
                    $('#activity').select2({
                        placeholder: "Click to select Activity",
                    });
                }
            });
        });

    </script>
@endsection
