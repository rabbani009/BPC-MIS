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
            <form action="{{ route('association.store') }}" method="post" data-bitwarden-watching="1" enctype="multipart/form-data" accept-charset="UTF-8">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name or Title</label>
                        <input type="text" name="association_name" class="form-control @if($errors->has('association_name')) is-invalid @endif" value="{!! old('association_name') !!}" placeholder="Enter Association Name">
                        @if($errors->has('association_name'))
                            <span class="error invalid-feedback">{!! $errors->first('association_name') !!}</span>
                        @else
                            <span class="help-block"> This field is required. </span>
                        @endif
                    </div>

                    <div class="form-group  @if ($errors->has('association_belongs_to')) has-error @endif">
                        <label class="control-label">Association belongs to</label>
                        <select name="type" id="type" class="form-control select2">
                            @foreach($councils as $council)
                                <option value="{!! $council->id !!}" @if(old('type') == $council->id) {!! 'selected' !!} @endif>{!! $council->name !!}</option>
                            @endforeach
                        </select>

                        @if($errors->has('type'))
                            <span class="help-block"> {!! $errors->first('type') !!} </span>
                        @else
                            <span class="help-block"> The type field is required. </span>
                        @endif
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </section>

    @include('backend.pages.association._table')
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
