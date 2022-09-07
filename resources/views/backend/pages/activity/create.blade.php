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
            <form action="{{ route('activity.store') }}" method="post" data-bitwarden-watching="1" enctype="multipart/form-data" accept-charset="UTF-8">
                @csrf
                <div class="card-body">
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
                    <div id="association_block">
                    </div>
                    <div id="trainers_block">
                    </div>
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
                            <span class="help-block"> The type field is required. </span>
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="activity_name" class="form-control @if($errors->has('activity_name')) is-invalid @endif" value="{{ old('activity_name') }}" placeholder="Enter activity Name">
                        @if($errors->has('activity_name'))
                            <span class="error invalid-feedback">{{ $errors->first('activity_name') }}</span>
                        @else
                            <span class="help-block"> This field is required. </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" value="{{ old('email') }}" placeholder="Enter activity Email">
                        @if($errors->has('activity_name'))
                            <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                        @else
                            <span class="help-block"> This field is required. </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Mobile</label>
                        <input type="text" name="mobile" class="form-control @if($errors->has('mobile')) is-invalid @endif" value="{{ old('mobile') }}" placeholder="Enter activity Mobile">
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

    @include('backend.pages.activity._table')
@endsection


<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_js_scripts')
    <script>
        $( document ).ready(function() {
            $('#council').select2();
            $("#area_of_expertise").select2({
                tags: true,
                tokenSeparators: [',']
            });
            $("#program").select2();

            $.ajax({
                type:'POST',
                url:"{{ route('ajax.get-associations-by-council') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                data: {council_id: $('#council').val()},
                success:function(html){
                    console.log('loading on load..');
                    $("#association_block").html(html);
                    $('#association').select2();

                    $.ajax({
                        type:'POST',
                        url:"{{ route('ajax.get-trainers-by-council-and-association') }}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                        data: {council_id: $('#council').val(), association_id: $('#association').val()},
                        success:function(html){
                            console.log('loading on load..');
                            $("#trainers_block").html(html);
                            $('#trainers').select2();
                        }
                    });
                }
            });


        });

        $('#council').on('change', function (e) {
            console.log('loading on change..');
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:"{{ route('ajax.get-associations-by-council') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                data: {council_id: $('#council').val()},
                success:function(html){
                    console.log('loading on load..');
                    $("#association_block").html(html);
                    $('#association').select2();

                    $.ajax({
                        type:'POST',
                        url:"{{ route('ajax.get-trainers-by-council-and-association') }}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                        data: {council_id: $('#council').val(), association_id: $('#association').val()},
                        success:function(html){
                            console.log('loading on load..');
                            $("#trainers_block").html(html);
                            $('#trainers').select2();
                        }
                    });
                }
            });
        });

        $('#association').on('change', function (e) {
            console.log('loading on change..');
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:"{{ route('ajax.get-trainers-by-association') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                data: {association_id: $('#association').val()},
                success:function(html){
                    console.log('loading on load..');
                    $("#trainers_block").html(html);
                    $('#trainers').select2();
                }
            });
        });



    </script>
@endsection
