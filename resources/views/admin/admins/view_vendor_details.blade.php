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
      <div class="row">
        <!-- Personal Detials-->
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Vendor Personal Details</h4>
                <p class="card-description">
                </p>
                  <div class="form-group">
                    <label>Vendor Email</label>
                    <input type="text" value="{{$vendorDetails['vendor_personal']['email']}}" class="form-control"  readonly="">
                  </div>
                  <div class="form-group">
                    <label for="vendor_name">Vendor Name</label>
                    <input type="text" value="{{$vendorDetails['vendor_personal']['name']}}" class="form-control"
                    name="vendor_name" id="vendor_name" placeholder="" readonly="">

                 </div>
                 <div class="form-group">
                    <label for="vendor_address">Vendor Address</label>
                    <input type="text" value="{{$vendorDetails['vendor_personal']['address']}}" class="form-control"
                    name="vendor_address" id="vendor_address" placeholder="" readonly="">
                 </div>
                 <div class="form-group">
                    <label for="vendor_city">Vendor City</label>
                    <input type="text" value="{{$vendorDetails['vendor_personal']['city']}}" class="form-control"
                    name="vendor_city" id="vendor_city" placeholder="" readonly="">
                 </div>
                 <div class="form-group">
                    <label for="vendor_state">Vendor State</label>
                    <input type="text" value="{{$vendorDetails['vendor_personal']['state']}}" class="form-control"
                    name="vendor_state" id="vendor_state" placeholder="" readonly="">
                 </div>
                 <div class="form-group">
                    <label for="vendor_country">Vendor Country</label>
                    <input type="text" value="{{$vendorDetails['vendor_personal']['country']}}" class="form-control"
                    name="vendor_country" id="vendor_country" placeholder="" readonly="">
                 </div>
                 <div class="form-group">
                    <label for="vendor_pincode">Vendor Pincode</label>
                    <input type="text" value="{{$vendorDetails['vendor_personal']['pincode']}}" class="form-control"
                    name="vendor_pincode" id="vendor_pincode" placeholder="" readonly="">
                 </div>
                  <div class="form-group">
                    <label for="vendor_mobile">Vendor Mobile</label>
                    <input type="text" value="{{$vendorDetails['vendor_personal']['mobile']}}" class="form-control"
                    name="vendor_mobile" id="vendor_mobile" minlength="10" maxlength="13" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="vendor_image">Vendor Avatar</label>
                    <br />
                    @if(!empty($vendorDetails['image']))
                    <img style="width: 200px;" src="{{url('admin/images/photos/' . $vendorDetails['image'])}}">
                    @endif
                  </div>
              </div>
            </div>
          </div>

        <!-- Business Details-->

        </div>
        <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include("admin.layout.footer")
    <!-- partial -->
  </div>
</div>
@endsection
