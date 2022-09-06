@extends('backend')

@section('page_level_css_plugins')

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
            <form action="{{ route('trainer.store') }}" method="post" data-bitwarden-watching="1" enctype="multipart/form-data" accept-charset="UTF-8">
                @csrf
                <div class="card-body">
                    <div class="form-group  @if ($errors->has('council')) has-error @endif">
                        <label class="control-label">Council</label>
                        <select name="council" id="council" class="form-control select2 @if($errors->has('council')) is-invalid @endif" value="{!! old('council') !!}">
                            @foreach($councils as $council)
                                <option value="{!! $council->id !!}" @if(old('type') == $council->id) {!! 'selected' !!} @endif>{!! $council->name !!}</option>
                            @endforeach
                        </select>

                        @if($errors->has('council'))
                            <span class="error invalid-feedback"> {!! $errors->first('council') !!} </span>
                        @else
                            <span class="help-block"> The type field is required. </span>
                        @endif
                    </div>

                    <div class="form-group  @if ($errors->has('association')) has-error @endif">
                        <label class="control-label">Association</label>
                        <select name="association" id="association" class="form-control select2 @if($errors->has('association')) is-invalid @endif" value="{!! old('association') !!}">
                            @foreach($associations as $association)
                                <option value="{!! $association->id !!}" @if(old('type') == $association->id) {!! 'selected' !!} @endif>{!! $association->name !!}</option>
                            @endforeach
                        </select>

                        @if($errors->has('association'))
                            <span class="error invalid-feedback"> {!! $errors->first('association') !!} </span>
                        @else
                            <span class="help-block"> The type field is required. </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="trainer_name" class="form-control @if($errors->has('trainer_name')) is-invalid @endif" value="{!! old('trainer_name') !!}" placeholder="Enter trainer Name">
                        @if($errors->has('trainer_name'))
                            <span class="error invalid-feedback">{!! $errors->first('trainer_name') !!}</span>
                        @else
                            <span class="help-block"> This field is required. </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" name="trainer_name" class="form-control @if($errors->has('trainer_name')) is-invalid @endif" value="{!! old('trainer_name') !!}" placeholder="Enter trainer Name">
                        @if($errors->has('trainer_name'))
                            <span class="error invalid-feedback">{!! $errors->first('trainer_name') !!}</span>
                        @else
                            <span class="help-block"> This field is required. </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Mobile</label>
                        <input type="text" name="trainer_name" class="form-control @if($errors->has('trainer_name')) is-invalid @endif" value="{!! old('trainer_name') !!}" placeholder="Enter trainer Name">
                        @if($errors->has('trainer_name'))
                            <span class="error invalid-feedback">{!! $errors->first('trainer_name') !!}</span>
                        @else
                            <span class="help-block"> This field is required. </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Gender</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="1" type="radio" id="customRadio1" name="status" checked>
                            <label for="customRadio1" class="custom-control-label">Male</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="0" type="radio" id="customRadio2" name="status">
                            <label for="customRadio2" class="custom-control-label">Female</label>
                        </div>
                        @if($errors->has('status'))
                            <span class="error invalid-feedback">{!! $errors->first('status') !!}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Area of Expertise</label>
                        <input type="text" name="trainer_name" class="form-control @if($errors->has('trainer_name')) is-invalid @endif" value="{!! old('trainer_name') !!}" placeholder="Enter trainer Name">
                        @if($errors->has('trainer_name'))
                            <span class="error invalid-feedback">{!! $errors->first('trainer_name') !!}</span>
                        @else
                            <span class="help-block"> This field is required. </span>
                        @endif
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </section>

    @include('backend.pages.trainer._table')
@endsection


<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')

@endsection
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_js_scripts')
    <script>


    </script>
@endsection
