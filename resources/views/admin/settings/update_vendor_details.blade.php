@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Settings</h3>
            </div>
            <div class="col-12 col-xl-4">
             <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                 <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                  <a class="dropdown-item" href="#">January - March</a>
                  <a class="dropdown-item" href="#">March - June</a>
                  <a class="dropdown-item" href="#">June - August</a>
                  <a class="dropdown-item" href="#">August - November</a>
                </div>
              </div>
             </div>
            </div>
          </div>
        </div>
      </div>
      @if($slug=='personal')
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update Vendor Details</h4>
                <p class="card-description">
                </p>
                @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error: </strong> {{Session::get('error_message')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                @if(Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success: </strong> {{Session::get('success_message')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                <form class="forms-sample" action="{{url('/admin/update-vendor-details/')}}/{{$slug}}" method="post"
                name="udpatevendorDetailsForm" id="udpatevendorDetailsForm" enctype="multipart/form-data">@csrf
                  <div class="form-group">
                    <label>Vendor Email</label>
                    <input type="text" value="{{Auth::guard('admin')->user()->email}}" class="form-control"  readonly="">
                  </div>
                  <div class="form-group">
                    <label>Vendor Type</label>
                    <input type="text" value="{{Auth::guard('admin')->user()->type}}" class="form-control" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="vendor_name">Vendor Name</label>
                    <input type="text" value="{{Auth::guard('admin')->user()->name}}" class="form-control"
                    name="vendor_name" id="vendor_name" placeholder="">

                 </div>
                 <div class="form-group">
                    <label for="vendor_address">Vendor Address</label>
                    <input type="text" value="{{$vendorDetails['address']}}" class="form-control"
                    name="vendor_address" id="vendor_address" placeholder="">
                 </div>
                 <div class="form-group">
                    <label for="vendor_city">Vendor City</label>
                    <input type="text" value="{{$vendorDetails['city']}}" class="form-control"
                    name="vendor_city" id="vendor_city" placeholder="">
                 </div>
                 <div class="form-group">
                    <label for="vendor_state">Vendor State</label>
                    <input type="text" value="{{$vendorDetails['state']}}" class="form-control"
                    name="vendor_state" id="vendor_state" placeholder="">
                 </div>
                 <div class="form-group">
                    <label for="vendor_country">Vendor Country</label>
                    <input type="text" value="{{$vendorDetails['country']}}" class="form-control"
                    name="vendor_country" id="vendor_country" placeholder="">
                 </div>
                 <div class="form-group">
                    <label for="vendor_pincode">Vendor Pincode</label>
                    <input type="text" value="{{$vendorDetails['pincode']}}" class="form-control"
                    name="vendor_pincode" id="vendor_pincode" placeholder="">
                 </div>
                  <div class="form-group">
                    <label for="vendor_mobile">Vendor Mobile</label>
                    <input type="text" value="{{$vendorDetails['mobile']}}" class="form-control"
                    name="vendor_mobile" id="vendor_mobile" placeholder="Enter the 10-15 mobile phone numbers" minlength="10" maxlength="13">
                  </div>
                  <div class="form-group">
                    <label for="vendor_image">Vendor Avatar</label>
                    <input type="file" class="form-control" name="vendor_image" id="vendor_image" placeholder="Upload Vendor Avatar">
                    @if(!empty(Auth::guard('admin')->user()->image))
                    <a target="_blank" href="{{url('admin/images/photos/'.Auth::guard('admin')->user()->image)}}">View Image</a>
                    @endif
                    <input type="hidden" name="current_vendor_image" value="{{Auth::guard('admin')->user()->image}}"></div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                </form>
              </div>
            </div>
          </div>
      </div>
      @elseif ($slug=='business')
      @elseif ($slug=='bank')
      @endif
        <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include("admin.layout.footer")
    <!-- partial -->
  </div>
</div>
@endsection
