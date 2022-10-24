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
                <h1 class="card-title">User Name : {{ $users->name }}</h1>
       
            </div>
        </div>

        <div class="card-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                <div class="row">
                  <div class="col-12 col-sm-3">
                    <div class="info-box bg-light">
                      <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Name</span>
                        <span class="info-box-number text-center text-muted mb-0">{{ $users->name}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-3">
                    <div class="info-box bg-light">
                      <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Email Address</span>
                        <span class="info-box-number text-center text-muted mb-0">{{ $users->email}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-3">
                    <div class="info-box bg-light">
                      <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">User Type</span>
                        <span class="info-box-number text-center text-muted mb-0">{{ $users->user_type }}</span>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 col-sm-3">
                    <div class="info-box bg-light">
                      <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Role</span>
                        <span class="info-box-number text-center text-muted mb-0">{{ $users->role->name }}</span>
                      </div>
                    </div>
                  </div>


                </div>
             
              </div>
            
            
          </div>

          <div class="row">
            <div class="col-12 col-sm-4">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="info-box-text text-center text-muted">Permissions</span>
                  <span class="info-box-number text-center text-muted mb-0">{{ $users->permissions }}</span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-8">
              <div class="info-box bg-light">
                <div class="info-box-content">
                  <span class="info-box-text text-center text-muted">Accesses</span>
                  <span class="info-box-number text-center text-muted mb-0">{{ isset($users->accesses) ? $users->accesses : 'NA'}}</span>
                </div>
              </div>
            </div>
            
          </div>
       

      </div>
          <!-- /.card-body -->

          <div class="text-center mt-5 mb-3">
            <a href="{{route('user.index')}}" class="btn btn-sm btn-primary">User List</a>
            <a href="{{route('user.create')}}" class="btn btn-sm btn-warning">Create User</a>
          </div>

    </section>

    {{-- @include('backend.pages.user._table') --}}
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
