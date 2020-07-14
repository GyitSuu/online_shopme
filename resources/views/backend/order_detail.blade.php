@extends('backend/backend_template')
  @section('content')
    <div class="container-fluid">

      <!-- Page Heading -->
      @if (\Session::has('success'))
        <div class="alert alert-success col-md-4 offset-4">
            <ul>
                <li class="list-unstyled">{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if($order[0]->status == 0)
          <h1 class="h3 mb-0 text-gray-800">New Order Detail</h1>
        @elseif($order[0]->status == 1)
          <h1 class="h3 mb-0 text-gray-800">Pending Order Detail</h1>
        @else
          <h1 class="h3 mb-0 text-gray-800">Delivered Order Detail</h1>
        @endif
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
      </div>

      <!-- Content Row -->
      <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="row">
                    <div class="col-10 text-xs font-weight-bold text-info text-uppercase mb-1">Voucher Information</div>
                    <div class="col-auto float-right">
                      <i class="fas fa-clipboard-list fa-2x text-info"></i>
                    </div>
                  </div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-4">Voucher No</div>
                    <div class="col-8">{{$order[0]->voucher_no}}</div>
                  </div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-4">Order Date</div>
                    <div class="col-8">{{$order[0]->order_date}}</div>
                  </div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-4">Deliverd Address</div>
                    <div class="col-8">{{$order[0]->address}}</div>
                  </div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-4">Total Price</div>
                    <div class="col-8">{{$order[0]->total_price}}</div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="row">
                    <div class="col-10 text-xs font-weight-bold text-success text-uppercase mb-1">Customer Information</div>
                    <div class="col-auto float-right">
                      <i class="fas fa-user fa-2x text-success"></i>
                    </div>
                  </div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-4">Name</div>
                    <div class="col-8">{{$order[0]->user->name}}</div>
                  </div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-4">Email</div>
                    <div class="col-8">{{$order[0]->user->email}}</div>
                  </div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-4">Address</div>
                    <div class="col-8">NO 55, 62 street, ManawHari Road, Chan Mya Thar Si, Mandalay</div>
                  </div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-4">Phone No</div>
                    <div class="col-8">0987654452</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Content Row -->

      <div class="row">
        @foreach($order_details as $order_detail)
          <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{$order_detail->item->item_name}}</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                    <img src="{{asset($order_detail->image)}}" class="img-fluid">
                    <div class="mt-4 text-center small">
                      <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Size - <?php if ($order_detail->size_id) { ?>
                          {{$order_detail->size->size}} 
                        <?php } else echo 'Free'; ?>
                      </span>
                      <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Qty -  {{$order_detail->qty}}
                      </span>
                      <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Price - {{$order_detail->subtotal}}
                      </span>
                    </div>
                  </div>
                </div>
          </div>
        @endforeach
      </div>
      @if($order[0]->status != 2)
        <div class="col-auto float-right">
        <form method="post" action="{{route('admin.change_status',$order[0]->id)}}" class="d-inline-block">
          @csrf
          @method('PUT')
          <input type="hidden" name="status" value="{{$order[0]->status}}">  
          <button type="submit" class="btn btn-primary btn-md d-inline-block" >Receive <i class="fas fa-clipboard-list"></i></button>
        </form>
        </div>
      @endif
    </div>
  @endsection
