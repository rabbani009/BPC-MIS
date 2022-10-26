@extends('backend')

@section('page_level_css_plugins')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection

@section('page_level_css_files')

@endsection

@section('content')
<section class="content">
<div class="container-fluid">
    <div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">User Information Update</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        {{-- <form method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data"> --}}

            <form action="{{ route('profile.update', $editData->id) }}" method="post" data-bitwarden-watching="1" enctype="multipart/form-data" accept-charset="UTF-8">
                @csrf
                @method('patch')
            
            @csrf
            <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="name" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name" value={{ $editData->name }}>
                </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value={{ $editData->email }}>
            </div>
           
            <div class="form-group">
                <label for="exampleInputFile">Change profile picture</label>
                <div class="input-group">
                <div class="custom-file">
                   
                    <input name="profile_image" class="form-control custom-file-input" type="file"  id="image">
                 
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                </div>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1"></label>
                <img id="showImage" class="rounded-circle avatar-lg" src="{{(!empty($user->profile_image)) ? url('upload/profile_images/'. Auth::user()->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap" width="160" height="160">
            </div>


        


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update profile</button>
            </div>
        </form>
        </div>
        <!-- /.card -->

    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</section>

{{-- @include('backend.pages.program._table') --}}
@endsection


<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')

@endsection
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_js_scripts')

<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });


</script>


</script>
@endsection