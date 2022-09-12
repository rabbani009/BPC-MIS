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
            <div class="card-body">
                <div class="first_section">

                </div>

                <div class="second_section"></div>
            </div>
            s
            <form action="{{ route('post.activity.console', $activity->id) }}" method="post" data-bitwarden-watching="1" enctype="multipart/form-data" accept-charset="UTF-8">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="form-group  @if ($errors->has('council')) has-error @endif">
                        <label class="control-label">Council</label>
                        <select name="council" id="council" class="form-control select2">
                            <option value="{{ $activity->id }}" @if($activity->getCouncil->id == $council->id) {{ 'selected' }} @endif>{{ $council->name }}</option>
                        </select>
                    </div>
                    <div id="association_block">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Trainer Name</label>
                        <input type="text" name="trainer_name" class="form-control @if($errors->has('trainer_name')) is-invalid @endif" value="{{ $activity->name }}" placeholder="Enter trainer Name">
                        @if($errors->has('trainer_name'))
                            <span class="error invalid-feedback">{{ $errors->first('trainer_name') }}</span>
                        @else
                            <span class="help-block"> This field is required. </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" value="{{ $activity->email }}" placeholder="Enter trainer Email">
                        @if($errors->has('trainer_name'))
                            <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                        @else
                            <span class="help-block"> This field is required. </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Mobile</label>
                        <input type="text" name="mobile" class="form-control @if($errors->has('mobile')) is-invalid @endif" value="{{ $activity->mobile }}" placeholder="Enter trainer Mobile">
                        @if($errors->has('mobile'))
                            <span class="error invalid-feedback">{{ $errors->first('mobile') }}</span>
                        @else
                            <span class="help-block"> This field is required. </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Gender</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="male" type="radio" id="customRadio1" name="gender" @if($activity->gender == 'Male') checked @endif>
                            <label for="customRadio1" class="custom-control-label">Male</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="female" type="radio" id="customRadio2" name="gender"  @if($activity->gender == 'Female') checked @endif>
                            <label for="customRadio2" class="custom-control-label">Female</label>
                        </div>
                        @if($errors->has('gender'))
                            <span class="error invalid-feedback">{{ $errors->first('gender') }}</span>
                        @endif
                    </div>

                    <div class="form-group  @if ($errors->has('area_of_expertise')) has-error @endif">
                        <label class="control-label">Area of Expertise (Please type the area of expertise below and hit enter)</label>
                        <select name="area_of_expertise[]" id="area_of_expertise" class="form-control" multiple="multiple" >
                            @foreach($activity->area_of_expertise as $tnr)
                                <option value="{{ $tnr }}" selected>{{ $tnr }}</option>
                            @endforeach
                        </select>

                        @if($errors->has('area_of_expertise'))
                            <span class="error invalid-feedback"> {{ $errors->first('area_of_expertise') }} </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>

                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="1" type="radio" id="customRadio1" name="status" @if($activity->status == 1) checked="checked" @endif>
                            <label for="customRadio1" class="custom-control-label">Active</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="0" type="radio" id="customRadio2" name="status" @if($activity->status == 0) checked="checked" @endif>
                            <label for="customRadio2" class="custom-control-label">Inactive</label>
                        </div>
                        @if($errors->has('status'))
                            <span class="error invalid-feedback">{!! $errors->first('status') !!}</span>
                        @endif
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>

    </section>

    {{-- @include('backend.pages.trainer._table') --}}
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
            })

            $.ajax({
                type:'POST',
                url:"{{ route('ajax.get-associations-by-council') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                data: {council_id: $('#council').val()},
                success:function(html){
                    console.log('loading on load..');
                    $("#association_block").html(html);
                    $('#association').select2();
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
                    $("#association_block").html(html);
                    $('#association').select2();
                }
            });
        });

    </script>
@endsection
