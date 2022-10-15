@extends('backend')

@section('page_level_css_plugins')
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <link href="{{ asset('AdminLTE-3.2.0/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
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
            <form action="{{ route('user.store') }}" method="post" data-bitwarden-watching="1" enctype="multipart/form-data" accept-charset="UTF-8">
                @csrf
                <div class="card-body">
                    <div class="container card">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email*</label>
                                    <input required type="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" value="{{ old('email') }}" placeholder="Enter email">
                                    @if($errors->has('email'))
                                        <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                    @else
                                        <span class="help-block"> This field is required. </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password*</label>
                                    <input required type="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif" value="{{ old('password') }}" placeholder="Enter password">
                                    @if($errors->has('password'))
                                        <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                                    @else
                                        <span class="help-block"> This field is required. </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container card">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group  @if ($errors->has('user_type')) has-error @endif">
                                    <label class="control-label">User type*</label>
                                    <select required name="user_type" id="user_type" class="form-control select2 @if($errors->has('user_type')) is-invalid @endif" value="{!! old('user_type') !!}">
                                        @foreach($user_types as $user_type)
                                            <option value="{!! $user_type !!}" @if(old('user_type') == $user_type) {!! 'selected' !!} @endif>{!! $user_type !!}</option>
                                        @endforeach
                                    </select>

                                    @if($errors->has('user_type'))
                                        <span class="error invalid-feedback"> {!! $errors->first('user_type') !!} </span>
                                    @else
                                        <span class="help-block"> The type field is required. </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group  @if ($errors->has('belongs_to')) has-error @endif">
                                    <label class="control-label">Select council*</label>
                                    <select required name="belongs_to" id="belongs_to" class="form-control select2 @if($errors->has('belongs_to')) is-invalid @endif" value="{!! old('belongs_to') !!}">
                                        @foreach($councils as $council)
                                            <option value="{!! $council->id !!}" @if(old('belongs_to') == $council->id) {!! 'selected' !!} @endif>{!! $council->name !!}</option>
                                        @endforeach
                                    </select>

                                    @if($errors->has('belongs_to'))
                                        <span class="error invalid-feedback"> {!! $errors->first('belongs_to') !!} </span>
                                    @else
                                        <span class="help-block"> The type field is required. </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group  @if ($errors->has('role')) has-error @endif">
                                    <label class="control-label">Select user role* </label>
                                    <select required name="role" id="role" class="form-control select2 @if($errors->has('role')) is-invalid @endif" value="{!! old('role') !!}">
                                        @foreach($roles as $role)
                                            <option value="{!! $role->id !!}" @if(old('role') == $role->id) {!! 'selected' !!} @endif>{!! $role->name !!}</option>
                                        @endforeach
                                    </select>

                                    @if($errors->has('belongs_to'))
                                        <span class="error invalid-feedback"> {!! $errors->first('belongs_to') !!} </span>
                                    @else
                                        <span class="help-block"> The type field is required. </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group  @if ($errors->has('accesses')) has-error @endif">
                                    <label class="control-label">Access*</label>
                                    {{ Form::select('accesses[]', $routes, null, ['id="accesses", class="form-control select2"']) }}

                                    @if($errors->has('accesses'))
                                        <span class="error invalid-feedback"> {!! $errors->first('accesses') !!} </span>
                                    @else
                                        <span class="help-block"> The type field is required. </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group  @if ($errors->has('belongs_to')) has-error @endif">
                                    <label class="control-label">Permissions*</label>
                                    {{ Form::select('permissions[]', $permissions, old('permissions')?old('permissions'):null, ['id="permissions", class="form-control select2"']) }}

                                    @if($errors->has('belongs_to'))
                                        <span class="error invalid-feedback"> {!! $errors->first('belongs_to') !!} </span>
                                    @else
                                        <span class="help-block"> The type field is required. </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container card">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" value="{{ old('name') }}" placeholder="Enter name">
                                    @if($errors->has('name'))
                                        <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                    @else
                                        <span class="help-block"> This field is required. </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Select profile picture</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="profile_image" class="form-control custom-file-input"
                                                   type="file" id="profile_image">

                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    @if($errors->has('profile_image'))
                                        <span class="error invalid-feedback">{{ $errors->first('profile_image') }}</span>
                                    @endif
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

    @include('backend.pages.user._table')
@endsection


<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')
    <script src="{{ asset('AdminLTE-3.2.0/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
@endsection
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_js_scripts')
    <script>
        $('#accesses').select2({
            "multiple": true,
            "tags": false
        });

        $('#permissions').select2({
            "multiple": true,
            "tags": false
        });
    </script>
@endsection
