@if (Session::has('success'))
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    {!! Session::get('success') !!}
                </div>
            </div>
        </div>
    </section>
@endif
