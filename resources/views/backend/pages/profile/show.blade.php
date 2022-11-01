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

              <!-- Profile Image -->
              
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{ asset('upload/profile_images/avater.jpg') }}"
                         alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center">{{ $profile->name }}</h3>
  
                  <p class="text-muted text-center">{{ $profile->user_type }}</p>
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Full Name</b> <a class="float-right">{{ $profile->name }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="float-right">{{ $profile->email }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>User Type</b> <a class="float-right">{{ $profile->role->name }}</a>
                    </li>
                  </ul>

          @if(auth()->user()->user_type =='council' || auth()->user()->user_type =='system' )
  
                  <a href="{!! route('profile.edit', \Illuminate\Support\Facades\Auth::user()->id) !!}" class="btn btn-primary btn-block"><b>Edit profile</b></a>

          @endif
                </div>
                <!-- /.card-body -->
             
              <!-- /.card -->
        </div>

    </section>

    {{-- @include('backend.pages.program._table') --}}
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