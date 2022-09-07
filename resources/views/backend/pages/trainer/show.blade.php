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
                    <label for="exampleInputEmail1">Council</label>
                    <input disabled name="council_name" class="form-control" value="{{ $trainer->getCouncil->name ?? 'None' }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Association</label>
                    <input disabled name="council_name" class="form-control" value="{{ $trainer->getAssociation->name ?? 'None' }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input disabled name="council_name" class="form-control" value="{{ $trainer->name }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input disabled name="council_name" class="form-control" value="{{ $trainer->email }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input disabled name="council_name" class="form-control" value="{{ $trainer->mobile }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Gender</label>
                    <input disabled name="council_name" class="form-control" value="{{ $trainer->gender }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Area of Expertise</label>
                    <input disabled name="council_name" class="form-control" value="{{ $trainer->area_of_expertise }}">
                </div>
            </div>

            <div class="card-footer">
                <a href="{{ route('trainer.edit', $trainer->id) }}" class="btn btn-outline-secondary">Edit</a>
            </div>

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
