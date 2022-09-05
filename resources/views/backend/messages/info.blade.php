@if (Session::has('info'))
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info"></i> Info!</h4>
                    {!! Session::get('info') !!}
                </div>
            </div>
        </div>
    </section>
@endif
