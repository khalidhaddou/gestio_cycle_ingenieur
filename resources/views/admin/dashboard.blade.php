@extends('admin.layouts.master')

@section('title','PFA')
@section('css')


@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var options = {
  chart: {
    height: 200,
    type: "radialBar",

  },

  series: [67],
  colors: ["rgb(255,105,0)"],
  plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: "70%",
        background: "#0693e3"
      },
      track: {
        dropShadow: {
          enabled: true,
          top: 2,
          left: 0,
          blur: 4,
          opacity: 0.15
        }
      },
      dataLabels: {
        name: {
          offsetY: -10,
          color: "#fff",
          fontSize: "13px"
        },
        value: {
          color: "#fff",
          fontSize: "20px",
          show: true
        }
      }
    }
  },
  fill: {
    type: "gradient",
    gradient: {
      shade: "dark",
      type: "vertical",
      gradientToColors: ["#0693e3"],
      stops: [0, 100]
    }
  },
  stroke: {
    lineCap: "round"
  },
  labels: ["Total "]
};

var chart = new ApexCharts(document.querySelector("#chart1"), options);

chart.render();

</script>
<script>
    var options = {
  chart: {
    height: 200,
    type: "radialBar",

  },

  series: [67],
  colors: ["#0693e3"],
  plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: "70%",
        background: "rgb(255,105,0)"
      },
      track: {
        dropShadow: {
          enabled: true,
          top: 2,
          left: 0,
          blur: 4,
          opacity: 0.15
        }
      },
      dataLabels: {
        name: {
          offsetY: -10,
          color: "#fff",
          fontSize: "13px"
        },
        value: {
          color: "#fff",
          fontSize: "20px",
          show: true
        }
      }
    }
  },
  fill: {
    type: "gradient",
    gradient: {
      shade: "dark",
      type: "vertical",
      gradientToColors: ["rgb(255,105,0)"],
      stops: [0, 100]
    }
  },
  stroke: {
    lineCap: "round"
  },
  labels: ["Total "]
};

var chart = new ApexCharts(document.querySelector("#chart2"), options);

chart.render();

</script>

<script>
    var options = {
  chart: {
    height: 200,
    type: "radialBar",

  },

  series: [67],
  colors: ["rgb(255,105,0)"],
  plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: "70%",
        background: "#0693e3"
      },
      track: {
        dropShadow: {
          enabled: true,
          top: 2,
          left: 0,
          blur: 4,
          opacity: 0.15
        }
      },
      dataLabels: {
        name: {
          offsetY: -10,
          color: "#fff",
          fontSize: "13px"
        },
        value: {
          color: "#fff",
          fontSize: "20px",
          show: true
        }
      }
    }
  },
  fill: {
    type: "gradient",
    gradient: {
      shade: "dark",
      type: "vertical",
      gradientToColors: ["#0693e3"],
      stops: [0, 100]
    }
  },
  stroke: {
    lineCap: "round"
  },
  labels: ["Total"]
};

var chart = new ApexCharts(document.querySelector("#chart3"), options);

chart.render();

</script>
<script>
    var options = {
          series: [
          {
            name: 'Actual',
            data: [
              {
                x: '2011',
                y: 1292,
                goals: [
                  {
                    name: 'Expected',
                    value: 1400,
                    strokeHeight: 5,
                    strokeColor: '#0693e3'
                  }
                ]
              },
              {
                x: '2012',
                y: 4432,
                goals: [
                  {
                    name: 'Expected',
                    value: 5400,
                    strokeHeight: 5,
                    strokeColor: '#0693e3'
                  }
                ]
              },
              {
                x: '2013',
                y: 5423,
                goals: [
                  {
                    name: 'Expected',
                    value: 5200,
                    strokeHeight: 5,
                    strokeColor: '#0693e3'
                  }
                ]
              },
              {
                x: '2014',
                y: 6653,
                goals: [
                  {
                    name: 'Expected',
                    value: 6500,
                    strokeHeight: 5,
                    strokeColor: '#0693e3'
                  }
                ]
              },
              {
                x: '2015',
                y: 8133,
                goals: [
                  {
                    name: 'Expected',
                    value: 6600,
                    strokeHeight: 13,
                    strokeWidth: 0,
                    strokeLineCap: 'round',
                    strokeColor: '#0693e3'
                  }
                ]
              },
              {
                x: '2016',
                y: 7132,
                goals: [
                  {
                    name: 'Expected',
                    value: 7500,
                    strokeHeight: 5,
                    strokeColor: '#0693e3'
                  }
                ]
              },
              {
                x: '2017',
                y: 7332,
                goals: [
                  {
                    name: 'Expected',
                    value: 8700,
                    strokeHeight: 5,
                    strokeColor: '#0693e3'
                  }
                ]
              },
              {
                x: '2018',
                y: 6553,
                goals: [
                  {
                    name: 'Expected',
                    value: 7300,
                    strokeHeight: 2,
                    strokeDashArray: 2,
                    strokeColor: '#0693e3'
                  }
                ]
              }
            ]
          }
        ],
          chart: {
          height: 350,
          type: 'bar'
        },
        plotOptions: {
          bar: {
            columnWidth: '60%'
          }
        },
        colors: ['#ff6900'],
        dataLabels: {
          enabled: false
        },
        legend: {
          show: true,
          showForSingleSeries: true,
          customLegendItems: ['Actual', 'Expected'],
          markers: {
            fillColors: ['#ff6900', '#0693e3']
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
 var data;
 var chart;

  // Load the Visualization API and the piechart package.
  google.charts.load('current', {'packages':['corechart']});

  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChart);

  // Callback that creates and populates a data table,
  // instantiates the pie chart, passes in the data and
  // draws it.
  function drawChart() {

    // Create our data table.
    data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
    data.addRows([
      ['S1', 3],
      ['S2', 1],
      ['S3', 1],
      ['S4', 1],
      ['S5', 2]
    ]);

    // Set chart options
    var options = {'title':'Nombre etudiands par semestre en %',
                   'width':400,
                   'height':300};

    // Instantiate and draw our chart, passing in some options.
    chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    google.visualization.events.addListener(chart, 'select', selectHandler);
    chart.draw(data, options);
  }

  function selectHandler() {
    var selectedItem = chart.getSelection()[0];
    var value = data.getValue(selectedItem.row, 0);
    alert('The user selected ' + value);
  }

</script>


@endsection
@section('content')
<div class=" content-wrapper">
    <!-- Content -->

    <div class="flex-grow-1 container-p-y mx-2">
      <div class="row">
        <div class="col-md">
          <div class="card  mb-3" >

            <div class="card-body">
                <div class="text-center" id="chart1">

                </div>


            </div>
          </div>
        </div>
        <div class="col-md">
            <div class="card  mb-3">
              <div class="card-body">
                  <div class="text-center" id="chart2">

                  </div>


              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="card  mb-3">
              <div class="card-body">
                  <div class=" text-center" id="chart3">

                  </div>


              </div>
            </div>
          </div>
      </div>


      <div class="row">
        <div class="col-md my-6">
            <div class="flex justify-center">
          <div class="block rounded-lg shadow-lg bg-white max-w-50 text-center">
            <div class="flex py-2 border-b border-gray-300 text-sm font-bold text-black">
              <span class="mx-28 text-gray-400">Le nombres des etudiants par années </span>
              </div>
              <div id="chart_div"></div>

            </div>
            </div>
            </div>
        <div class="col-md my-6">
        <div class="flex justify-center">
      <div class="block rounded-lg shadow-lg bg-white max-w-50 text-center">
        <div class="flex py-2 border-b border-gray-300 text-sm font-bold text-black">
          <span class="mx-28 text-gray-400">Le nombres etudiant par années </span>
          </div>
          <div id="chart"></div>

        </div>
        </div>
        </div>


    </div>

      </div>


    </div>
@endsection



