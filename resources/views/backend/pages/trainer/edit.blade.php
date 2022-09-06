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
            <form action="{{ route('trainer.update', $trainer->id) }}" method="post" data-bitwarden-watching="1" enctype="multipart/form-data" accept-charset="UTF-8">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name or Title</label>
                        <input type="text" name="trainer_name" class="form-control @if($errors->has('trainer_name')) is-invalid @endif" value="{!! $trainer->name !!}" placeholder="Enter trainer Name">
                        @if($errors->has('trainer_name'))
                            <span class="error invalid-feedback">{!! $errors->first('trainer_name') !!}</span>
                        @else
                            <span class="help-block"> This field is required. </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>

                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="1" type="radio" id="customRadio1" name="status" @if($trainer->status == 1) checked="checked" @endif>
                            <label for="customRadio1" class="custom-control-label">Active</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="0" type="radio" id="customRadio2" name="status" @if($trainer->status == 0) checked="checked" @endif>
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

    @include('backend.pages.trainer._table')
@endsection


<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')

@endsection
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_js_scripts')

@endsection
