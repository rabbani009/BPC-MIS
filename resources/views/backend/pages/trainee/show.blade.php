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

            <div class="card-body">
                <table class="table table-striped table-responsive">
                    <tr>
                        <th style="width: 5%">SL .</th>
                        <th>{{ $trainee->name }} -> Information</th>
                     
                    </tr>
              
                        <tr>
                            <td style="width: 5%"></td>
                            <td>
                                <p><strong>Name: </strong>{{$trainee->name}}</p>
                                <p><strong>Age: </strong>{{$trainee->age}}</p>
                                <p><strong>Gender: </strong>{{$trainee->gender}}</p>
                                <p><strong>Qualification: </strong>{{$trainee->qualification}}</p>
                                <p><strong>Organization: </strong>{{$trainee->organization}}</p>
                                <p><strong>Designation: </strong>{{$trainee->designation}}</p>
                                <p><strong>Phone: </strong>{{$trainee->phone}}</p>
                                <p><strong>Email: </strong>{{$trainee->email}}</p>
                                <p><strong>Covid Status: </strong>{{$trainee->covid_status}}</p>
                            </td>
                            
                        </tr>
                    
                </table>
            </div>

            <div class="card-footer">
                <a href="{{ route('trainee.edit', $trainee->id) }}" class="btn btn-outline-secondary">Edit</a>
            </div>

        </div>

    </section>

  
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
