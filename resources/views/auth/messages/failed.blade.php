@if (Session::has('failed'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Failed!</h4>
        {!! Session::get('failed') !!}
    </div>
@endif
