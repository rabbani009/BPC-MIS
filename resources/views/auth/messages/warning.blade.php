@if (Session::has('warning'))
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Warning!</h4>
        {!! Session::get('warning') !!}
    </div>
@endif
