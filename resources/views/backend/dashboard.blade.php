@extends('backend/backend_template')
  @section('content')
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
      </div>

      <!-- Content Row -->
      <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">New Order</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">@php echo count($new_orders) @endphp Items</div>
                </div>
                <div class="col-auto">
                  <button class="btn btn-primary btn-sm d-inline-block newOrder"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending Orders</div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">@php echo count($pending_orders) @endphp Items</div>
                    </div>
                    <div class="col">
                      <div class="progress progress-sm mr-2">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-auto">
                  <button class="btn btn-info btn-sm d-inline-block pendingOrder"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Delivered Orders</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">@php echo count($delivered_orders) @endphp Items</div>
                </div>
                <div class="col-auto">
                  <button class="btn btn-success btn-sm d-inline-block deliveredOrder">
                  <i class="far fa-check-circle fa-2x text-gray-300"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Content Row -->

      <div class="row" id="newOrder">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                  <div class="dropdown-header">Dropdown Header:</div>
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="table-responsive ">
                <table class="table table-bordered align-items-center table-white table-flush example" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                          <tr>
                            <th>No</th>
                            <th>VocherNo</th>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Detail</th>
                          </tr>
                        </thead>
                        <tbody id="statusTable">
                          <?php $i=1;?>
                          @foreach($new_orders as $new_order)
                          <tr>
                              <td>{{$i++}}</td>
                              <td>{{$new_order->voucher_no}}</td>
                              <td>{{$new_order->user->name}}</td>
                              <td>{{$new_order->address}}</td>
                              <td><a href="{{route('admin.get_order_detail',$new_order->voucher_no)}}"><i class="btn-sm fas fa-edit text-white"  style="background-color: #5e72e4"></i></a>
                              </td>

                          </tr>
                          @endforeach
                          
                        </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row d-none" id="pendingOrder">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                  <div class="dropdown-header">Dropdown Header:</div>
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered align-items-center table-white table-flush example" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                          <tr>
                            <th>No</th>
                            <th>VocherNo</th>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Detail</th>
                          </tr>
                        </thead>
                        <tbody id="statusTable">
                          <?php $i=1;?>
                          @foreach($pending_orders as $pending_order)
                          <tr>
                              <td>{{$i++}}</td>
                              <td>{{$pending_order->voucher_no}}</td>
                              <td>{{$pending_order->user->name}}</td>
                              <td>{{$pending_order->address}}</td>
                              <td><a href="{{route('admin.get_order_detail',$pending_order->voucher_no)}}"><i class="btn-sm fas fa-edit text-white"  style="background-color: #5e72e4"></i></a>
                              </td>

                          </tr>
                          @endforeach
                          
                        </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row d-none" id="deliveredOrder">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                  <div class="dropdown-header">Dropdown Header:</div>
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered align-items-center table-white table-flush example" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                          <tr>
                            <th>No</th>
                            <th>VocherNo</th>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Detail</th>
                          </tr>
                        </thead>
                        <tbody id="statusTable">
                          <?php $i=1;?>
                          @foreach($delivered_orders as $delivered_order)
                          <tr>
                              <td>{{$i++}}</td>
                              <td>{{$delivered_order->voucher_no}}</td>
                              <td>{{$delivered_order->user->name}}</td>
                              <td>{{$delivered_order->address}}</td>
                              <td><a href="{{route('admin.get_order_detail',$delivered_order->voucher_no)}}"><i class="btn-sm fas fa-edit text-white"  style="background-color: #5e72e4"></i></a>
                              </td>

                          </tr>
                          @endforeach
                          
                        </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  @endsection
  @section('script')
  <script type="text/javascript">
    $(document).ready(function (argument) {
      $('.newOrder').click(function (argument) {
        $('#pendingOrder').addClass("d-none")
        $('#deliveredOrder').addClass("d-none")
        $('#newOrder').removeClass("d-none")
      })
      $('.pendingOrder').click(function (argument) {
        $('#newOrder').addClass("d-none")
        $('#deliveredOrder').addClass("d-none")
        $('#pendingOrder').removeClass("d-none")
      })
      $('.deliveredOrder').click(function (argument) {
        $('#newOrder').addClass("d-none")
        $('#pendingOrder').addClass("d-none")
        $('#deliveredOrder').removeClass("d-none")
      })
    })
  </script>
  @endsection

