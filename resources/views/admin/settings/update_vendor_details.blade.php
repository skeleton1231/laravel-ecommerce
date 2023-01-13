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
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update Business Details</h4>
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
                    <label for="shop_name">Shop Name</label>
                    <input type="text" value="{{$vendorDetails['shop_name']}}" class="form-control"
                    name="shop_name" id="shop_name" placeholder="">
                 </div>
                 <div class="form-group">
                    <label for="shop_address">Shop Address</label>
                    <input type="text" value="{{$vendorDetails['shop_address']}}" class="form-control"
                    name="shop_address" id="shop_address" placeholder="">
                 </div>
                 <div class="form-group">
                    <label for="shop_city">Shop City</label>
                    <input type="text" value="{{$vendorDetails['shop_city']}}" class="form-control"
                    name="shop_city" id="shop_city" placeholder="">
                 </div>
                 <div class="form-group">
                    <label for="vendor_state">Shop State</label>
                    <input type="text" value="{{$vendorDetails['shop_state']}}" class="form-control"
                    name="shop_state" id="shop_state" placeholder="">
                 </div>
                 <div class="form-group">
                    <label for="vendor_country">Shop Country</label>
                    <input type="text" value="{{$vendorDetails['shop_country']}}" class="form-control"
                    name="shop_country" id="shop_country" placeholder="">
                 </div>
                 <div class="form-group">
                    <label for="shop_pincode">Shop Pincode</label>
                    <input type="text" value="{{$vendorDetails['shop_pincode']}}" class="form-control"
                    name="shop_pincode" id="shop_pincode" placeholder="">
                 </div>
                  <div class="form-group">
                    <label for="shop_mobile">Shop Mobile</label>
                    <input type="text" value="{{$vendorDetails['shop_mobile']}}" class="form-control"
                    name="shop_mobile" id="shop_mobile" placeholder="Enter the 10-15 mobile phone numbers" minlength="10" maxlength="13">
                  </div>
                  <div class="form-group">
                    <label for="shop_website">Shop Website</label>
                    <input type="text" value="{{$vendorDetails['shop_website']}}" class="form-control"
                    name="shop_website" id="shop_website" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="shop_email">Shop Email</label>
                    <input type="text" value="{{$vendorDetails['shop_email']}}" class="form-control"
                    name="shop_email" id="shop_email" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="vendor_country">Business License Number</label>
                    <input type="text" value="{{$vendorDetails['business_license_number']}}" class="form-control"
                    name="business_license_number" id="business_license_number" placeholder="">
                 </div>
                 <div class="form-group">
                  <label for="vendor_country">GST Number</label>
                  <input type="text" value="{{$vendorDetails['gst_number']}}" class="form-control"
                  name="gst_number" id="gst_number" placeholder="">
                 </div>
               <div class="form-group">
                <label for="vendor_country">PAN Number</label>
                <input type="text" value="{{$vendorDetails['pan_number']}}" class="form-control"
                name="pan_number" id="pan_number" placeholder="">
              </div>
                  <div class="form-group">
                    <label for="address_proof">Shop Address Proof</label>
                    <select class="form-control" name="address_proof" id="address_proof">
                        <option value="Passport" @if($vendorDetails['address_proof'] == "Passport") selected @endif>Passport</option>
                        <option value="Voting Card" @if($vendorDetails['address_proof'] == "Voting Card") selected @endif>Voting Card</option>
                        <option value="PAN" @if($vendorDetails['address_proof'] == "PAN") selected @endif>PAN</option>
                        <option value="Driving License" @if($vendorDetails['address_proof'] == "Driving License") selected @endif>Driving License</option>
                        <option value="Identity Card" @if($vendorDetails['address_proof'] == "Identity Card") selected @endif>Identity Card</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="vendor_image">Shop Address Proof Image</label>
                    <input type="file" class="form-control" name="address_proof_image" id="address_proof_image" placeholder="Upload Address Proof Image">
                    @if(!empty($vendorDetails['address_proof_image']))
                    <a target="_blank" href="{{url('admin/images/proofs').'/'.$vendorDetails['address_proof_image']}}">View Image</a>
                    @endif
                    <input type="hidden" name="current_address_proof_image" value="{{$vendorDetails['address_proof_image']}}"></div>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                </form>
              </div>
            </div>
          </div>
      </div>
      @elseif ($slug=='bank')
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update Bank Details</h4>
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
                    <label for="account_holder_name">Account Holder Name</label>
                    <input type="text" value="{{$vendorDetails['account_holder_name']}}" class="form-control"
                    name="account_holder_name" id="account_holder_name" placeholder="">
                 </div>
                 <div class="form-group">
                    <label for="bank_name">Bank Name</label>
                    <input type="text" value="{{$vendorDetails['bank_name']}}" class="form-control"
                    name="bank_name" id="bank_name" placeholder="">
                 </div>
                 <div class="form-group">
                    <label for="account_number">Account Number</label>
                    <input type="text" value="{{$vendorDetails['account_number']}}" class="form-control"
                    name="account_number" id="account_number" placeholder="">
                 </div>
                 <div class="form-group">
                    <label for="bank_ifsc_code">Bank Ifsc Code</label>
                    <input type="text" value="{{$vendorDetails['bank_ifsc_code']}}" class="form-control"
                    name="bank_ifsc_code" id="bank_ifsc_code" placeholder="">
                 </div>
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                </form>
              </div>
            </div>
          </div>
      </div>
      @endif
        <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include("admin.layout.footer")
    <!-- partial -->
  </div>
</div>
@endsection
