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
            <h3 class="card-title"><span>Filter data accorging to <span style="color:green">Council->Program</span></span></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <a href="{{ route('participants.pdf') }}" style="margin-bottom: 10px" class="btn btn-primary">Export PDF</a>
            <thead>
              
            </thead>
            <tbody>

            @foreach($get_activities_by_council as $activities)
             
                    <tr class="table-danger">
                  
                        <td colspan="4">{{ $activities->getCouncil->name }}</td>
                        <td colspan="4">{{ $activities->activity_title }}</td>
                    
                    </tr>

                    <tr>
                        
                        <th>name</th>
                        <th>phone</th>
                        <th>email</th>
                        <th>gender</th>
                        <th>organization</th>
                        <th>qualification</th>
                        <th>designation</th>
                        <th>covid_status</th>
                
                    </tr>
                
                @foreach($activities->getTrainees as $row)

              
                
                        <tr>
                        
                            <td>{{ $row->name }}.</td>
                            <td>{{ $row->phone }}.</td>
                            <td>{{ $row->email }}.</td>
                            <td>{{ $row->gender }}.</td>
                            <td>{{ $row->organization }}.</td>
                            <td>{{ $row->qualification }}.</td>
                            <td>{{ $row->designation }}.</td>
                            <td>{{ $row->covid_status }}.</td>
                    
                        </tr>
                @endforeach 
                
        @endforeach
            </tbody>
            <tfoot>
                {{-- <tr>
                
                    <th>SL.</th>
                    <th colspan="4">Council</th> 
                    <th colspan="4">Activity</th>
                     
                </tr> --}}
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
{{-- <script>
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
"buttons": [
{
text: 'PDF',
extend: 'pdfHtml5',
title: 'Business Promotion Council participants Information',
message: '',
orientation: 'landscape',

customize: function (doc) {
doc.pageMargins = [10,10,10,10];
doc.defaultStyle.fontSize = 7;
doc.styles.tableHeader.fontSize = 7;
doc.styles.title.fontSize = 9;
// Remove spaces around page title
doc.content[0].text = doc.content[0].text.trim();
// Create a footer
doc['footer']=(function(page, pages) {
return {
    columns: [
        'This is your left footer column',
        {
            // This is the right column
            alignment: 'right',
            text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
        }
    ],
    margin: [10, 0]
}
});
// Styling the table: create style object
var objLayout = {};
// Horizontal line thickness
objLayout['hLineWidth'] = function(i) { return .5; };
// Vertikal line thickness
objLayout['vLineWidth'] = function(i) { return .5; };
// Horizontal line color
objLayout['hLineColor'] = function(i) { return '#aaa'; };
// Vertical line color
objLayout['vLineColor'] = function(i) { return '#aaa'; };
// Left padding of the cell
objLayout['paddingLeft'] = function(i) { return 4; };
// Right padding of the cell
objLayout['paddingRight'] = function(i) { return 4; };
// Inject the object in the document
doc.content[1].layout = objLayout;
    }

}


]
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


</script> --}}

@endsection
