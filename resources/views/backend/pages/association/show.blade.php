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
                    <label for="exampleInputEmail1">Association Name or Title</label>
                    <input disabled name="name" class="form-control" value="{!! $association->name !!}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Slug</label>
                    <input disabled name="slug" class="form-control" value="{!! $association->slug !!}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Association belong to (Council)</label>
                    <input disabled name="slug" class="form-control" value="{!! $association->council->name !!}">
                </div>
            </div>

            <div class="card-footer">
                <a href="{!! route('association.edit', $association->id) !!}" class="btn btn-outline-secondary">Edit</a>
            </div>

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
