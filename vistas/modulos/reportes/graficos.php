<?php


        $item = null;
        $valor = null;

        //grafica tratamientos
        $respuesta = ControladorPacientes::ctrMostrarTratamientos();
        //grafica edades
        $respuestaedad = ControladorReportes::ctrMostrarEdad();
        //grafica pacientes
        $respuestapac = ControladorReportes::ctrMostrarPacientes();
        var_dump($respuestapac[1]);
      
?>


<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <!-- AREA CHART -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Pacientes</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="line-chart" style="height:230px; min-height:230px"></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- DONUT CHART -->
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Tratamientos</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <canvas id="donutChart" style="height:230px; min-height:230px"></canvas>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col (LEFT) -->
      <div class="col-md-6">
        <!-- LINE CHART -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Citas</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="lineChart" style="height:250px; min-height:250px"></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- BAR CHART -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Edades</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="areaChart" style="height:230px; min-height:230px"></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>


<script>

$(function () {

//GRAFICA DONA

  var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
  var donutData        = {
    labels: [
      <?php 
      $count = 0;
      foreach($respuesta as $totalN):
        if(++$count === count($respuesta)) {
            echo "'".$totalN[0]."'";//Nombre
          }else{
            echo "'".$totalN[0]."',";//Nombres
        }
      endforeach;
        ?>
    ],
    datasets: [
      {
        data: [
          <?php
             $count = 0;
             foreach($respuesta as $total):
               if(++$count === count($respuesta)) {
                   echo $total[1];//Total
                 }else{
                   echo $total[1].',';//Total
               }
             endforeach;            
          ?>
          ],
        backgroundColor : [
          <?php 
            $colors = array('#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#99FF99', '#99FF', '#FF66FF');
            $countcolors = 0;
            for ($i=0; $i < $count ; $i++) { 
              //echo $colors[$i];
              if(++$countcolors === $count) {
                echo "'".$colors[$i]."'";
                }else{
                  echo "'".$colors[$i]."'".',';
                }
            }
            ?>
            
        ],
      }
    ]
  }
  var donutOptions     = {
    maintainAspectRatio : false,
    responsive : true,
  }
  //Crea la grafica de pie
  var donutChart = new Chart(donutChartCanvas, {
    type: 'doughnut',
    data: donutData,
    options: donutOptions
  })


// GRAFICA AREA

  var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : [<?php 
      $count = 0;
      foreach($respuestaedad as $totaledad):
        if(++$count === count($respuestaedad)) {
            echo "'".$totaledad[0]."'";//Nombre
          }else{
            echo "'".$totaledad[0]."',";//Nombres
        }
      endforeach;
        ?>],
      datasets: [
        {
          label               : 'Total',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php 
      $count = 0;
      foreach($respuestaedad as $totale):
        if(++$count === count($respuestaedad)) {
            echo "'".$totale[1]."'";//Nombre
          }else{
            echo "'".$totale[1]."',";//Nombres
        }
      endforeach;
        ?>]
        }
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          },
        }],
        yAxes: [{
          gridLines : {
            display : false,
          },
          ticks: {
          callback: function(value, index, values) {
          return parseFloat(value).toFixed();
          },
          autoSkip: true,
          maxTicksLimit: 10,
          stepSize: 1
          }
        }]
      }
    }

    var areaChart       = new Chart(areaChartCanvas, { 
      type: 'line',
      data: areaChartData, 
      options: areaChartOptions
    })

// GRAFICA LINEAL

new Chart(document.getElementById("line-chart"), {
    type: 'bar',
    data: {
      labels: ["1900", "1950", "1999", "2050", "2050", "2050", "2050", "2050", "2050", "2050", "2050", "2050"],
      datasets: [
        {
          label: "Africa",
          backgroundColor: "#3e95cd",
          data: [<?php 
      $count = 0;
      foreach($respuestapac as $totalp):
        if(++$count === count($respuestapac)) {
            echo "'".$totalp[1]."'";//Nombre
          }else{
            echo "'".$totalp[1]."',";//Nombres
        }
      endforeach;
        ?>]
        }, {
          label: "Europe",
          backgroundColor: "#8e5ea2",
          data: []
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Population growth (millions)'
      }
    }
});

})
</script>
