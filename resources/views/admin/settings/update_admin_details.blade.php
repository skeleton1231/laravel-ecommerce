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
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update Admin Details</h4>
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
                <form class="forms-sample" action="{{url('/admin/update-admin-details')}}" method="post"
                name="udpateAdminDetailsForm" id="udpateAdminDetailsForm">@csrf
                  <div class="form-group">
                    <label>Admin Email</label>
                    <input type="text" value="{{Auth::guard('admin')->user()->email}}" class="form-control"  readonly="">
                  </div>
                  <div class="form-group">
                    <label>Admin Type</label>
                    <input type="text" value="{{Auth::guard('admin')->user()->type}}" class="form-control" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="admin_name">Name</label>
                    <input type="text" value="{{Auth::guard('admin')->user()->name}}" class="form-control"
                    name="admin_name" id="admin_name" placeholder="">
                    <span id="check_password"></span>
                </div>
                  <div class="form-group">
                    <label for="admin_mobile">Mobile</label>
                    <input type="text" value="{{Auth::guard('admin')->user()->mobile}}" class="form-control"
                    name="admin_mobile" id="admin_mobile" placeholder="Enter the 10-15 mobile phone numbers" minlength="10" maxlength="13">
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                </form>
              </div>
            </div>
          </div>
      </div>
        <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include("admin.layout.footer")
    <!-- partial -->
  </div>
</div>
@endsection
