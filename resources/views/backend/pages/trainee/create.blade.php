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
                        <div class="col-md-4">
                            <div id="association_block">
                                <div class="form-group  @if ($errors->has('association')) has-error @endif">
                                    <label class="control-label">Association *</label>
                                    {{ Form::select('association', $associations, old('association')?old('association'):null, ['id="association", class="form-control select2"']) }}

                                    @if($errors->has('association'))
                                        <span class="error invalid-feedback"> {!! $errors->first('association') !!} </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="activity_block">

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="trainee_name" class="form-control @if($errors->has('trainee_name')) is-invalid @endif" value="{{ old('trainee_name') }}" placeholder="Enter trainee Name">
                        @if($errors->has('trainee_name'))
                            <span class="error invalid-feedback">{{ $errors->first('trainee_name') }}</span>
                        @else
                            <span class="help-block"> This field is required. </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" value="{{ old('email') }}" placeholder="Enter trainee Email">
                        @if($errors->has('trainee_name'))
                            <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                        @else
                            <span class="help-block"> This field is required. </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Mobile</label>
                        <input type="text" name="mobile" class="form-control @if($errors->has('mobile')) is-invalid @endif" value="{{ old('mobile') }}" placeholder="Enter trainee Mobile">
                        @if($errors->has('mobile'))
                            <span class="error invalid-feedback">{{ $errors->first('mobile') }}</span>
                        @else
                            <span class="help-block"> This field is required. </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Gender</label>
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
            $('#council').select2();
            $('#association').select2();
            $("#activity").select2();



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
                            $('#activities').select2({
                                placeholder: "Click to select Activity",
                            });

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
                                        $('#activities').select2({
                                            placeholder: "Click to select Activity",
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
                        url:"{{ route('ajax.get-activities-by-council-and-association') }}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                        data: {council_id: $('#council').val(), association_id: $('#association').val()},
                        success:function(html){
                            $("#activity_block").html(html);
                            $('#activities').select2({
                                placeholder: "Click to select Activity",
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
                                        console.log('loading on load..');
                                        $("#activity_block").html(html);
                                        $('#activities').select2({
                                            placeholder: "Click to select Activity",
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
