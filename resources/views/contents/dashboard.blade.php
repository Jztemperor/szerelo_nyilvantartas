<div class="p-4 sm:ml-64">
    <div class="p-4  mt-14">
        @include('includes._breadcrumb')
        <div class="grid grid-cols-2 gap-4 mb-20">
            <div class="flex rounded h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-800 dark:text-gray-500 m-5">
                    Welcome {{$user->name}}!
                    <br>
                    Role: {{$user->role->name}}
                </p>
            </div>

            
            <!-- Chart for Mechanics -->
            <!-- They should see thier worksheets by state -->
            @if($user->role->name == "mechanic")
            
            <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between items-start w-full">
                    <div class="flex-col items-center">
                        <div class="flex items-center mb-1">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">Work status</h5>
                         </div>
                    </div>
                </div>

            <!-- pie Chart -->
            <div class="py-6" id="chart-container">
                <div id="pie-chart"></div>
                <div id="no-data-message" class="text-center text-gray-500 dark:text-gray-400" style="display:none;">NO DATA</div>
            </div>

            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                <div class="flex justify-between items-center pt-5">
      
                    <a
                        href="{{route('works.index')}}"
                        class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                        Go to Works
                        <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endif


            <!-- Chart for Operators and Admins -->
            @if($user->role->name == "operator" || $user->role->name == "admin")
            
            <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between items-start w-full">
                    <div class="flex-col items-center">
                        <div class="flex items-center mb-1">
                            @if($user->role->name == "operator")
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">Your Worksheets</h5>
                            @elseif($user->role->name == "admin")
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">All Worksheets</h5>
                            @endif
                         </div>
                    </div>
                </div>

            <!-- pie Chart -->
            <div class="py-6" id="chart-container">
                <div id="pie-chart-operator"></div>
                <div id="no-data-message" class="text-center text-gray-500 dark:text-gray-400" style="display:none;">NO DATA</div>
            </div>

            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                <div class="flex justify-between items-center pt-5">
                    @if($user->role->name == "operator")
                    <a
                        href="{{route('worksheets.index')}}"
                        class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                        Go to Worksheets
                        <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @endif

        </div>
        @include('includes._footer')
    </div>
</div>

@php

    $closedPercentage = 0;

    if($user->role->name == "mechanic") 
    {
        $totalWorkorders = count($workorders);
        $assigned = count($workorders->whereIn('status', ['Started']));
        $workingCount = count($workorders->whereIn('status', ['Working']));
        $finishedCount = count($workorders->whereIn('status', ['Finished']));
    } else if($user->role->name == "operator" || $user->role->name == "admin")
    {
        $totalWorkorders = count($workorders);
        $assigned = count($workorders->whereIn('status', ['Started']));
        $workingCount = count($workorders->whereIn('status', ['Working']));
        $finishedCount = count($workorders->whereIn('status', ['Finished']));
        $closedCount = count($workorders->whereIn('status', ['Closed']));

        $closedPercentage = $totalWorkorders > 0 ? ($closedCount / $totalWorkorders) * 100 : 0;
    }

    $assignedPercentage = $totalWorkorders > 0 ? ($assigned / $totalWorkorders) * 100 : 0;
    $workingPercentage = $totalWorkorders > 0 ? ($workingCount / $totalWorkorders) * 100 : 0;
    $finishedPercentage = $totalWorkorders > 0 ? ($finishedCount / $totalWorkorders) * 100 : 0;
  
@endphp

<script>

const getChartOptions = () => {
  return {
    series: [{{ $assignedPercentage }} , {{ $workingPercentage }} , {{ $finishedPercentage }}],
    colors: ["#1C64F2", "#16BDCA", "#9061F9"],
    chart: {
      height: 420,
      width: "100%",
      type: "pie",
    },
    stroke: {
      colors: ["white"],
      lineCap: "",
    },
    plotOptions: {
      pie: {
        labels: {
          show: true,
        },
        size: "100%",
        dataLabels: {
          offset: -25
        }
      },
    },
    labels: ["Todo", "Working", "Finished"],
    dataLabels: {
      enabled: true,
      style: {
        fontFamily: "Inter, sans-serif",
      },
    },
    legend: {
      position: "bottom",
      fontFamily: "Inter, sans-serif",
    },
    yaxis: {
      labels: {
        formatter: function (value) {
          return value + "%"
        },
      },
    },
    xaxis: {
      labels: {
        formatter: function (value) {
          return value  + "%"
        },
      },
      axisTicks: {
        show: false,
      },
      axisBorder: {
        show: false,
      },
    },
  }
}

const getChartOptionsForOperator = () => {
  return {
    series: [{{ $assignedPercentage }} , {{ $workingPercentage }} , {{ $finishedPercentage }}, {{ $closedPercentage }}],
    colors: ["#1C64F2", "#16BDCA", "#9061F9", "#E74694"],
    chart: {
      height: 420,
      width: "100%",
      type: "pie",
    },
    stroke: {
      colors: ["white"],
      lineCap: "",
    },
    plotOptions: {
      pie: {
        labels: {
          show: true,
        },
        size: "100%",
        dataLabels: {
          offset: -25
        }
      },
    },
    labels: ["Todo", "Working", "Finished", "Closed"],
    dataLabels: {
      enabled: true,
      style: {
        fontFamily: "Inter, sans-serif",
      },
    },
    legend: {
      position: "bottom",
      fontFamily: "Inter, sans-serif",
    },
    yaxis: {
      labels: {
        formatter: function (value) {
          return value + "%"
        },
      },
    },
    xaxis: {
      labels: {
        formatter: function (value) {
          return value  + "%"
        },
      },
      axisTicks: {
        show: false,
      },
      axisBorder: {
        show: false,
      },
    },
  }
}


// Mechanic pie chart
if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
  const seriesData = [{{ $assignedPercentage }} , {{ $workingPercentage }} , {{ $finishedPercentage }}]
  const hasData = seriesData.some(value => value > 0);
  const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());

  if (hasData) {
    const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
    chart.render();
  } else {
    document.getElementById("pie-chart").style.display = 'none';
    document.getElementById("no-data-message").style.display = 'block';
  }
}

// Operator pie chart
if (document.getElementById("pie-chart-operator") && typeof ApexCharts !== 'undefined') {
  const seriesData = [{{ $assignedPercentage }} , {{ $workingPercentage }} , {{ $finishedPercentage }}, {{$closedPercentage}}]
  const hasData = seriesData.some(value => value > 0);
  const chart = new ApexCharts(document.getElementById("pie-chart-operator"), getChartOptionsForOperator());

  if (hasData) {
    const chart = new ApexCharts(document.getElementById("pie-chart-operator"), getChartOptionsForOperator());
    chart.render();
  } else {
    document.getElementById("pie-chart-operator").style.display = 'none';
    document.getElementById("no-data-message").style.display = 'block';
  }
}


</script>
