@extends('backend')

@section('page_level_css_plugins')
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <link href="{{ asset('AdminLTE-3.2.0/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />



  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section('page_level_css_files')

@endsection

@section('content')
    <section class="content">
        @if($errors->any())
            <div class="card pl-3 bg-danger">
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">{{ $commons['content_title'] }}</h1>

                <div class="card-tools">
                    Note:: * marked fields are required
                </div>
            </div>
            <form action="{{ route('search.index') }}" method="post" data-bitwarden-watching="1" enctype="multipart/form-data" accept-charset="UTF-8">
                @csrf
                <div class="card-body">
                    <!-- Prerequisites section -->
                    <div class="container card ">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group  @if ($errors->has('council')) has-error @endif">
                                    <label class="control-label">Council *</label>
                                    {{ Form::select('council', $councils, old('council')?old('council'):null, ['id="council", class="form-control select2"']) }}

                                    @if($errors->has('council'))
                                        <span class="error invalid-feedback"> {{ $errors->first('council') }} </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group  @if ($errors->has('association')) has-error @endif">
                                    <label class="control-label">Association *</label>
                                    <div id="association_block">
                                        {{ Form::select('association', $associations, old('association')?old('association'):null, ['id="association", class="form-control select2"']) }}
                                    </div>
                                    @if($errors->has('association'))
                                        <span class="error invalid-feedback"> {{ $errors->first('association') }} </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group  @if ($errors->has('program')) has-error @endif">
                                    <label class="control-label">Program *</label>
                                    {{ Form::select('program', $programs, old('program')?old('program'):null, ['id="program", class="form-control select2"']) }}

                                    @if($errors->has('program'))
                                        <span class="error invalid-feedback"> {{ $errors->first('program') }} </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ route('program.report') }}" class="btn btn-warning reset">Reset</a>
                </div>
                <input type="hidden" id="old_association_id" value="{{old('association')}}">
                @if((old('trainers') !== '') && is_array(old('trainers')))
                <input type="hidden" id="old_trainers" value="{{ implode(", ",old('trainers')) }}">
                @endif
            </form>
        </div>


    <!-- Main content -->

       
         
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                          <th style="width: 8px">SL NO.</th>
                          <th>Council</th>
                          <th>Association</th>
                          <th>Program</th>
  
                          <th>Activity Title</th>
                          <th>Remarks</th>
                          <th>Venue</th>
                          <th>Start Date</th>
                          <th>End Date</th>
  
                          <th>Number of Trainers</th>
                          <th>Number of Trainees</th>
  
  
                          <th>Source of fund</th>
                          <th>Budget as per contract</th>
                          <th>Actual budget as per expenditure</th>
                          <th>Actual expenditure as per actual budget</th>
                         

                        </tr>
                        </thead>
                        <tbody>

                      @foreach($activities as $row)
                          <tr>
                              <td>{{ $loop->iteration }}.</td>
      
                              <td>{{ $row->getCouncil->name }}</td>
                              <td>{{ $row->getAssociation->name }}</td>
                              <td>{{ $row->getProgram->name }}</td>
      
                              <td>{{ $row->activity_title }}</td>
                              <td>
      
                              @if($row->remarks == 0)
                                   <span class="badge badge-pill badge-info"> Ongoing </span>
                              @else
                                   <span class="badge badge-pill badge-success"> Done </span>
                              @endif
                              
                              </td>
                              <td>{{ isset($row->venue) ? $row->venue : 'NA' }}</td>
                              <td>{{ isset($row->start_date) ? $row->start_date : 'NA' }}</td>
                              <td>{{ isset($row->end_date) ? $row->end_date : 'NA' }}</td>
      
                              <td><button class="btn btn-md btn-outline-info">{{ isset($row->number_of_trainers) ? $row->number_of_trainers : 'NA' }}</button></td>
                              <td><button class="btn btn-md btn-outline-info">{{ isset($row->number_of_trainees) ? $row->number_of_trainees : 'NA' }}</button></td>
      
                              <td>{{ isset($row->source_of_fund) ? $row->source_of_fund : 'NA' }}</td>
                              <td>{{ isset($row->budget_as_per_contract) ? $row->budget_as_per_contract : 'NA' }}</td>
                              <td>{{ isset($row->actual_budget_as_per_expenditure) ? $row->actual_budget_as_per_expenditure : 'NA' }}</td>
                              <td>{{ isset($row->actual_expenditure_as_per_actual_budget) ? $row->actual_expenditure_as_per_actual_budget : 'NA' }}</td>
                              
                      @endforeach
                     
                       
                        </tbody>
                        <tfoot>
                        <tr>
                       
                          <th style="width: 8px">SL NO.</th>
                          <th>Council</th>
                          <th>Association</th>
                          <th>Program</th>
  
                          <th>Activity Title</th>
                          <th>Remarks</th>
                          <th>Venue</th>
                          <th>Start Date</th>
                          <th>End Date</th>
  
                          <th>Number of Trainers</th>
                          <th>Number of Trainees</th>
  
  
                          <th>Source of fund</th>
                          <th>Budget as per contract</th>
                          <th>Actual budget as per expenditure</th>
                          <th>Actual expenditure as per actual budget</th>

                        </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
           

    </section>

@endsection


<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')
    <script src="{{ asset('AdminLTE-3.2.0/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <script src="{{ asset('AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script src="{{ asset('AdminLTE-3.2.0/dist/js/adminlte.min.js') }}"></script>
 
@endsection
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_js_scripts')
    <script>
        /// Event loading...
        $( document ).ready(function() {
            $('#council').select2();
            $("#area_of_expertise").select2({
                tags: true,
                tokenSeparators: [',']
            });
            $("#program").select2();

            $(function () {
                $('#start_date').datetimepicker({
                    default: true,
                    format: 'L',
                    locale: 'BST',
                    format: 'YYYY-MM-DD'
                });
                $('#end_date').datetimepicker({
                    default: true,
                    format: 'L',
                    locale: 'BST',
                    format: 'YYYY-MM-DD',
                    placeholder: 'Select End Date'
                });
            });

            /// on load ajax 1.
            $.ajax({
                type:'POST',
                url:"{{ route('ajax.get-associations-by-council') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                data: {council_id: $('#council').val(), old_association_id: $('#old_association_id').val()},
                success:function(html){
                    $("#association_block").html(html);
                    $('#association').select2();

                    /// on load ajax 2.
                    $.ajax({
                        type:'POST',
                        url:"{{ route('ajax.get-trainers-by-council-and-association') }}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                        data: {council_id: $('#council').val(), association_id: $('#association').val(), old_trainers: $('#old_trainers').val()},
                        success:function(html){
                            $("#trainers_block").html(html);
                            $('#trainers').select2();
                            $('#trainers').select2({
                                placeholder: "Click to select trainers",
                            });

                            /// on load ajax 3.
                            $('#association').on('change', function (e) {
                                e.preventDefault();
                                $.ajax({
                                    type:'POST',
                                    url:"{{ route('ajax.get-trainers-by-association') }}",
                                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                                    data: {association_id: $('#association').val()},
                                    success:function(html){
                                        $("#trainers_block").html(html);
                                        $('#trainers').select2({
                                            placeholder: "Click to select trainers",
                                        });
                                    }
                                });
                            });
                        }
                    });
                }
            });
        });

        ///Event 1.
        $('#council').on('change', function (e) {
            e.preventDefault();
            ///event 1. > ajax 1.
            $.ajax({
                type:'POST',
                url:"{{ route('ajax.get-associations-by-council') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                data: {council_id: $('#council').val()},
                success:function(html){
                    console.log('loading on load..');
                    $("#association_block").html(html);
                    $('#association').select2();

                    ///event 1. > ajax 2.
                    $.ajax({
                        type:'POST',
                        url:"{{ route('ajax.get-trainers-by-council-and-association') }}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                        data: {council_id: $('#council').val(), association_id: $('#association').val()},
                        success:function(html){
                            $("#trainers_block").html(html);
                            $('#trainers').select2({
                                placeholder: "Click to select trainers",
                            });

                            ///event 1. > ajax 3.
                            $('#association').on('change', function (e) {
                                e.preventDefault();
                                $.ajax({
                                    type:'POST',
                                    url:"{{ route('ajax.get-trainers-by-association') }}",
                                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                                    data: {association_id: $('#association').val()},
                                    success:function(html){
                                        console.log('loading on load..');
                                        $("#trainers_block").html(html);
                                        $('#trainers').select2({
                                            placeholder: "Click to select trainers",
                                        });
                                    }
                                });
                            });
                        }
                    });
                }
            });
        });
    </script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>












@endsection
