<title>Click Invitations - Graph</title>
@include('header');
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Bar Chart</h4>
                  </div>
                  <div class="card-body">
                    <div class="recent-report__chart">
                      <div id="chart2"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row clearfix">
             
            </div>
            <div class="row clearfix">
              
            </div>
            <div class="row clearfix">
              
            </div>
          </div>
        </section>
      </div>
      {{-- <footer class="main-footer">
        <div class="footer-left">
          <a href="templateshub.net">Templateshub</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer> --}}
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/chart-apexcharts.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- chart-apexchart.html  21 Nov 2019 03:58:55 GMT -->
</html>

<script>

function chart2() {

var options = {
    chart: {
        height: 350,
        type: 'bar',
    },
    plotOptions: {
        bar: {
            dataLabels: {
                position: 'top', // top, center, bottom
            },
        }
    },
    dataLabels: {
        enabled: true,
        formatter: function (val) {
            return "$"+val ;
        },
        offsetY: -20,
        style: {
            fontSize: '12px',
            colors: ["#9aa0ac"]
        }
    },
    series: [{
        name: 'Inflation',
        data: [120.3, 300.1, 400.0, 1000.1, 400.0, 300.6, 300.2, 205.3, 100.4, 1000.8, 600.5, 750.2]
    }],
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        position: 'top',
        labels: {
            offsetY: -18,
            style: {
                colors: '#9aa0ac',
            }
        },
        axisBorder: {
            show: false
        },
        axisTicks: {
            show: false
        },
        crosshairs: {
            fill: {
                type: 'gradient',
                gradient: {
                    colorFrom: '#D8E3F0',
                    colorTo: '#BED1E6',
                    stops: [0, 100],
                    opacityFrom: 0.4,
                    opacityTo: 0.5,
                }
            }
        },
        tooltip: {
            enabled: true,
            offsetY: -35,

        }
    },
    fill: {
        gradient: {
            shade: 'light',
            type: "horizontal",
            shadeIntensity: 0.25,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [50, 0, 100, 100]
        },
    },
    yaxis: {
        axisBorder: {
            show: false
        },
        axisTicks: {
            show: false,
        },
        labels: {
            show: false,
            formatter: function (val) {
                return "$"+val;
            }
        }

    },
    title: {
        text: 'Monthly Inflation in Argentina, 2023',
        floating: true,
        offsetY: 320,
        align: 'center',
        style: {
            color: '#9aa0ac'
        }
    },
}

var chart = new ApexCharts(
    document.querySelector("#chart2"),
    options
);

chart.render();

}

</script>