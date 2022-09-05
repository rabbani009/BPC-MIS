@if (Session::has('failed'))
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Failed!</h4>
                    {!! Session::get('failed') !!}
                </div>
            </div>
        </div>
    </section>
@endif
