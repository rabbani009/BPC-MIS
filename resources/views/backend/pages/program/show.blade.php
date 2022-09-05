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

            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name or Title</label>
                    <input disabled name="council_name" class="form-control" value="{!! $program->name !!}">
                </div>
            </div>

            <div class="card-footer">
                <a href="{!! route('program.edit', $program->id) !!}" class="btn btn-outline-secondary">Edit</a>
            </div>

        </div>

    </section>

    @include('backend.pages.program._table')
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
