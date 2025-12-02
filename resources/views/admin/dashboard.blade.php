@extends ('admin.layouts.app')
<!-- Main content     -->
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $openIssues ?? 0 }}</h3>
            <p>Total Plants</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          {{-- @can('admin-access')
            <a href="{{ route('issue.open') }}" class="small-box-footer">More info <i
                class="fas fa-arrow-circle-right"></i></a>
          @endcan --}}
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $resolvedIssues ?? 0 }}</h3>
            <p>Total Users</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          {{-- @can('admin-access')
          <a href="{{ route('issue.resolved') }}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a>
          @endcan --}}
        </div>
      </div>
      {{-- @cannot('institute') --}}
      <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $pendingIssues ?? 0 }}</h3>
            <p>Pending Plants</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          {{-- <a href="{{ route('issue.pending') }}" class="small-box-footer">More info <i
              class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
      </div>
      {{-- @endcannot --}}
      @can('admin-access')
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $allUsers ?? 0 }}</h3>
              <p>All Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('users.all') }}" class="small-box-footer">More info <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      {{-- @endcan --}}
    </div>
    {{-- @can('super admin') --}}
      <div class="row">
        <section class="col-lg-12 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-data mr-1"></i>
                All Users
              </h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  {{-- <li class="nav-item">
                    <a class="nav-link active" href="#users-chart" data-toggle="tab">Institute</a>
                  </li> --}}
                  {{-- <li class="nav-item">
                    <a class="nav-link" href="#department-chart" data-toggle="tab">Department</a>
                  </li> --}}
                </ul>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-content p-0">
                <div class="chart tab-pane active" id="users-chart"
                  style="position: relative; height: 300px; overflow-y:scroll">
                  <table width="100%" border="1" cellpadding="5" cellspacing="0">
                    <thead>
                      <tr>
                        <td class="text-bold">#</td>
                        <td class="text-bold">Name</td>
                        <td class="text-bold">Email</td>
                        <td class="text-bold">Organization</td>
                        <td class="text-bold">Role</td>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i = 1; @endphp
                      @foreach ($Users as $user)
                        <tr>
                          <td>{{ $i }}</td>
                          <td>{{ $user['name'] }}</td>
                          <td>{{ $user['email'] }}</td>
                          <td>{{ $user['organization'] }}</td>
                          <td>{{ 'Admin' }}</td>
                          <td>{{ $user['email'] }}</td>
                        </tr>
                      @php $i++; @endphp
                      @endforeach
                    </tbody>
                  </table>
                </div>
                {{-- <div class="chart tab-pane" id="department-chart"
                  style="position: relative; height: 300px; overflow-y:scroll;">
                  <table width="100%" border="1" cellpadding="5" cellspacing="0">
                    <thead>
                      <tr>
                        <td class="text-bold">#</td>
                        <td class="text-bold">Name</td>
                        <td class="text-bold">Email</td>
                      </tr>
                    </thead>
                    <tbody>
                      @php $j = 1; @endphp
                      @foreach ($departmentUsers as $department)
                        <tr>
                          <td>{{ $j }}</td>
                          <td>{{ $department['name'] }}</td>
                          <td>{{ $department['email'] }}</td>
                        </tr>
                        @php $j++; @endphp
                      @endforeach
                    </tbody>
                  </table>
                </div> --}}
              </div>
            </div>
          </div>
        </section>
      </div>
    {{-- @endcan --}}

    <div class="row">
      <section class="col-lg-6 connectedSortable">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-data mr-1"></i>
              Plants
            </h3>
          </div>
          <div class="card-body">
            <div id="main" style="width:100%;height:400px;"></div>
          </div>
        </div>
      </section>

      <section class="col-lg-6 connectedSortable">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-data mr-1"></i>
                Users
            </h3>
          </div>
          <div class="card-body">
            <div id="main-budget" style="width:100%;height:400px;"></div>
          </div>
        </div>
      </section>
    </div>

    {{-- @can('admin-access') --}}
    <div class="row">
      <section class="col-lg-12 connectedSortable">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-data mr-1"></i>
             Plants by Latin Name
            </h3>
            <div class="card-tools">
              <div class="ml-auto">
                <form action="categorywisedata" id="categorywisedata">
                  <select name="category_id" id="category_id" class="form-control">
                    <option value="" disabled selected>--Select Category--</option>
                    {{-- @foreach ($all_categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach --}}
                  </select>
                </form>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div id="main-category" style="width:100%;height:600px;"></div>
          </div>
        </div>
      </section>
    </div>
    {{-- @endcan --}}
  </div>
</section>

@endsection


@push('scripts')
{{-- <script src="{{ asset('js/echarts.js') }}"></script>
<script type="text/javascript">
  var myChart = echarts.init(document.getElementById('main'));
  var xAxis_data = @json($allNames);
  var weightage_values = @json($allValues);

  var option = {
      title: {
          text: '',
          left: 'center'
      },
      tooltip: {
          trigger: 'axis',
          axisPointer: {
              type: 'shadow'
          }
      },
      legend: {
          data: ['Weightage'],
          bottom: 10
      },
      xAxis: {
          type: 'value',
          boundaryGap: [0, 0.01],
      },
      yAxis: {
          type: 'category',
          data: xAxis_data,
      },
      series: [
          {
              name: 'Weightage',
              type: 'bar',
              data: weightage_values,
              itemStyle: {
                  color: function (params) {
                      var colors = ['#5470C6', '#91CC75', '#EE6666', '#FAC858', '#73C0DE'];
                      return colors[params.dataIndex % colors.length];
                  }
              }
          }
      ]
  };
  myChart.setOption(option);
</script>
<script type="text/javascript">
    var myChart = echarts.init(document.getElementById('main-budget'));
    var xAxis_data = @json($allBNames);
    var weightage_values = @json($allBValues);

    var pieData = xAxis_data.map((name, index) => ({
        name: name,
        value: weightage_values[index]
    }));

    var option = {
        tooltip: {
            trigger: 'item',
            formatter: '{a} <br/>{b} : {c} ({d}%)'
        },
        legend: {
            orient: 'vertical',
            left: 'left',
            data: xAxis_data
        },
        series: [
            {
                name: 'Weightage',
                type: 'pie',
                radius: '50%',
                data: pieData,
                label: {
                    show: true,
                    position: 'outside',
                    formatter: '{b}: {c} ({d}%)'
                },
                labelLine: {
                    show: true
                },
                itemStyle: {
                    color: function (params) {
                        var colors = ['#5470C6', '#91CC75', '#EE6666', '#FAC858', '#73C0DE'];
                        return colors[params.dataIndex % colors.length];
                    }
                },
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };

    myChart.setOption(option);
</script>

<script>
  $(document).ready(function () {
    let chart = echarts.init(document.getElementById('main-category'));

    function loadChart(data) {
        let option = {
            tooltip: { trigger: 'axis' },
            xAxis: {
                type: 'category',
                data: data.map(item => item.name),
                axisLabel: { rotate: 45 } 
            },
            yAxis: { type: 'value' },
            series: [{
                type: 'bar',
                data: data.map(item => item.value), 
                barWidth: '50%', 
                itemStyle: {
                  color: function (params) {
                      var colors = ['#5470C6', '#91CC75', '#EE6666', '#FAC858', '#73C0DE'];
                      return colors[params.dataIndex % colors.length];
                  }
                }
            }]
        };
        chart.setOption(option);
    }

    $('select[name="category_id"]').change(function () {
        let category_id = $(this).val();

        $.ajax({
            url: '/admin/categorywisedata',
            type: 'GET',
            data: { category_id: category_id },
            success: function (response) {
                if (response.data.length > 0) {
                    loadChart(response.data);
                } else {
                    alert("No data available for this category.");
                }
            }
        });
    });

    if(!$('select[name="category_id"]').val()) {
      $('#category_id').val(1).trigger('change');
      $.ajax({
          url: '/admin/categorywisedata',
          type: 'GET',
          data: { category_id: 1 },
          success: function (response) {
              if (response.data.length > 0) {
                  loadChart(response.data);
              } else {
                  alert("No data available for this category.");
              }
          }
      });
    }

    
});

</script> --}}
@endpush
