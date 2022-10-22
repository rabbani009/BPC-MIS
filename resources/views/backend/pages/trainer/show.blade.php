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

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Trainer <span> <span style="color:green">View</span></span></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>council</th>
                        <th>association</th>
                        <th>program</th>
                        <th>name</th>
                        <th>email</th>
                        <th>mobile</th>
                        <th>gender</th>
                        <th>area_of_expertise</th>
                    </tr>
                    </thead>
                    <tbody>
        
                
     
                    <tr>
                        <td>{{ $trainer->id }}</td>
                        <td>{{ $trainer->getCouncil->name }}</td>
                        <td>{{ $trainer->getAssociation->name }}</td>
                        <td>{{ $trainer->getProgram->name }}</td>
                        <td>{{ $trainer->name }}</td>
                        <td>{{ $trainer->email }}</td>
                        <td>{{ $trainer->mobile }}</td>
                        <td>{{ $trainer->gender }}</td>
                        <td>{{ implode(', ', $trainer->area_of_expertise) }}</td>
                    </tr>
                
  
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>SL.</th>
                        <th>council</th>
                        <th>association</th>
                        <th>program</th>
                        <th>name</th>
                        <th>email</th>
                        <th>mobile</th>
                        <th>gender</th>
                        <th>area_of_expertise</th>
                    </tr>
                    </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
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
