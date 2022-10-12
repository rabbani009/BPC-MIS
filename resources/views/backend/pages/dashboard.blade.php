@extends('backend')

@section('page_level_css_plugins')

@endsection

@section('page_level_css_files')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">

         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> {{ $users ?? ' '  }}</h3>
  
                <p>Total User</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
     
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $programs ?? ' ' }}</h3>

              <p>Total Program Activites</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
       
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>0</h3>

              <p>Total Program Ongoing</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        
        <!-- ./col -->

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $councils ?? ' ' }}</h3>

                <p>Total Council</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
          <!-- ./col -->
      </div>

      
      <!-- /.row -->
      <!-- Main row -->
     
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- BAR CHART -->
          <div class="card card-success">
           <div class="card-header">
             <h3 class="card-title">Council-wise Information</h3>

             <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse">
                 <i class="fas fa-minus"></i>
               </button>
               <button type="button" class="btn btn-tool" data-card-widget="remove">
                 <i class="fas fa-times"></i>
               </button>
             </div>
           </div>
           <div class="card-body">
             <div class="chart">
               <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
             </div>
           </div>
           <!-- /.card-body -->
         </div>
         <!-- /.card -->
     </div>
      </div>
      <div class="row">
        <div class="col-md-6">

           <!-- DONUT CHART -->
           <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Trainee  Info Chart</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        <div class="col-md-6">
                    <!-- PIE CHART -->
                    <div class="card card-danger">
                      <div class="card-header">
                        <h3 class="card-title">Trainer Info Chart</h3>
          
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body">
                        <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
          
          
                  
        </div>


        <!-- /.col (RIGHT) -->     
  </div>  <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>


@endsection

<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')

<script src="{{ asset('AdminLTE-3.2.0/plugins/chart.js/Chart.min.js') }}"></script>

@endsection
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_js_scripts')
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.

    // Trainee Info Chart 
    //converting string data into javascript object--

    var male = JSON.parse('{{  $trainees_male }}');
    var female = JSON.parse('{{  $trainees_female }}');
    var others = JSON.parse('{{  $trainees_others }}');
    var total  =JSON.parse('{{  $trainees_total }}');


    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
                "Male",
                "Female",
                "Others",
                "Total"
      ],
      datasets: [
        {
          data: [male, female, others, total],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.

        // Trainer Info Chart

    var trainer = JSON.parse('{{  $trainer }}');
    var male_trainer = JSON.parse('{{  $male_trainer }}');
    var female_trainer  =JSON.parse('{{  $female_trainer }}');



    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: [
                  
                "Trainer",
                "Male Trainer",
                "Female Trainer"
      ],
      datasets: [
        {
          data: [trainer, male_trainer, female_trainer],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

      //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d');

//Councils Data

    var iBPC = JSON.parse('{{  $iBPC }}');
    var lSBPC = JSON.parse('{{  $lSBPC }}');
    var lEPBPC = JSON.parse('{{  $lEPBPC }}');
    var mPHPBPC = JSON.parse('{{  $mPHPBPC }}');
    var fPBPC = JSON.parse('{{  $fPBPC }}');
    var aPBPC = JSON.parse('{{  $aPBPC }}');
    var pPBPC = JSON.parse('{{  $pPBPC }}');

//Trainer Data

    var iBPC_trainers = JSON.parse('{{  $iBPC_trainers }}');
    var lSBPC_trainers = JSON.parse('{{  $lSBPC_trainers }}');
    var lEPBPC_trainers = JSON.parse('{{  $lEPBPC_trainers }}');
    var mPHPBPC_trainers = JSON.parse('{{  $mPHPBPC_trainers }}');
    var fPBPC_trainers = JSON.parse('{{  $fPBPC_trainers }}');
    var aPBPC_trainers = JSON.parse('{{  $aPBPC_trainers }}');
    var pPBPC_trainers = JSON.parse('{{  $pPBPC_trainers }}');

  //Activity Data

    var iBPC_activity = JSON.parse('{{  $iBPC_activity }}');
    var lSBPC_activity = JSON.parse('{{  $lSBPC_activity }}');
    var lEPBPC_activity = JSON.parse('{{  $lEPBPC_activity }}');
    var mPHPBPC_activity = JSON.parse('{{  $mPHPBPC_activity }}');
    var fPBPC_activity = JSON.parse('{{  $fPBPC_activity }}');
    var aPBPC_activity = JSON.parse('{{  $aPBPC_activity }}');
    var pPBPC_activity = JSON.parse('{{  $pPBPC_activity }}');




    var barChartData ={

      labels: ["IBPC", "LSBPC", "LEPBPC", "MPHPBPC", "FPBPC", "APBPC", "PPBPC"],
      datasets: [
             {
            label               : 'Association',
            backgroundColor     : 'rgb(21, 0, 80)',
            borderColor         : 'rgba(210, 214, 222, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : [iBPC, lSBPC, lEPBPC, mPHPBPC, fPBPC, aPBPC, pPBPC]
            },

            {
            label               : 'Trainers',
            backgroundColor     : 'rgb(129, 9, 85)',
            borderColor         : 'rgba(210, 214, 222, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : [iBPC_trainers,lSBPC_trainers, lEPBPC_trainers, mPHPBPC_trainers, fPBPC_trainers, aPBPC_trainers,pPBPC_trainers ]
            },

           {         
            label               : 'Activity',
            backgroundColor     : 'rgb(33, 146, 255)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : [iBPC_activity, lSBPC_activity, lEPBPC_activity, mPHPBPC_activity, fPBPC_activity, aPBPC_activity, pPBPC_activity]
            },
          
            
            {
            label               : 'Trainees',
            backgroundColor     : 'rgb(250, 112, 112)',
            borderColor         : 'rgba(210, 214, 222, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : [65, 59, 80, 81, 56, 55, 40]
            },
      ]
    }
 

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false,
      animation: 
                    
          {
          duration: 5000,
          easing: "easeInOutBounce",
          },

      legend: {
      display: true,
      position: "top", // top left bottom right
      align: "end", // start end center
      labels: {
       
        fontSize: 14,
        boxWidth: 20,
      },
    },

        // Configure ToolTips
        tooltips: {
      enabled: true, // Enable/Disable ToolTip By Default Its True
      backgroundColor: "#F9F9C5", // Set Tooltip Background Color
      titleFontFamily: "Tahoma", // Set Tooltip Title Font Family
      titleFontSize: 20, // Set Tooltip Font Size
      titleFontStyle: "bold",
      titleFontColor: "Maroon",
      titleAlign: "center",
      titleSpacing: 3,
      titleMarginBottom:20,
      bodyFontFamily: "Tahoma",
      bodyFontSize: 20,
     
      bodyFontColor: "black",
      bodyAlign: "center",
      bodySpacing: 3,
    },

  }

  

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })


    

    


    //---------------------
    //- STACKED BAR CHART -
    //---------------------
       // single bar chart "Sector Based Trainee Number Graph"
       
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'stacked',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>

@endsection
