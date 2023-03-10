<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\VendorsBankDetails;
use App\Models\VendorsBusinessDetail;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Image;
class AdminController extends Controller
{
    //
    public function dashboard() {
        Session::put('page', 'dashboard');
        return view('admin.dashboard');
    }

    //
    public function login(Request $request) {
        if($request->isMethod('post')){
            $data = $request->all();

            $request->validate([
                'email' => 'required|email:rfc,dns',
                'password' => 'required',
            ]);

            //$this->validatae($request,$rules,$customsMessages);
            if(Auth::guard('admin')->attempt([
                'email'=>$data['email'],
                'password'=>$data['password'],
                'status'=>1,])){
                return redirect('/admin/dashboard');
            } else {
                return redirect()->back()->with('error_message', 'Invalid Email or Password');
            }
        }
        return view('admin.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

    public function updateAdminPassword(Request $request){
        Session::put('page','update_admin_password');
        if($request->isMethod('post')){
            $data = $request->all();
            if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
                if($data['confirm_password']==$data['new_password']){
                    Admin::where('id', Auth::guard('admin')->user()->id)->update([
                        'password'=>bcrypt($data['new_password'])
                    ]);
                    return redirect()->back()->with('success_message', 'Your current password has been updated successfully');
                } else {
                    return redirect()->back()->with('error_message', 'Your new password is not same as confirm password');
                }

            }else{
                return redirect()->back()->with('error_message', 'Your current password is incorrect');
            }
        }
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_admin_password')->with(compact('adminDetails'));
    }

    public function checkAdminPassword(Request $request){
        $data = $request->all();
        if (Hash::check($data['current_password'],Auth::guard('admin')->user()->password)) {
            return "true";
        } else {
            return "false";
        }
    }

    public function updateAdminDetails(Request $request) {
        Session::put('page','update_admin_details');

        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'admin_name'=>'required|regex:/^[\pL\s\-]+$/u',
                'admin_mobile'=>'required|numeric',
            ];
            $customMessage = [
                'admin_name.required' => 'Name is required',
                'admin_name.regex' => 'Valid Name is required',
                'admin_mobile.required' => 'Mobile is required',
                'admin_mobile.regex' => 'Valid Mobile is required',
            ];
            $this->validate($request,$rules,$customMessage);

            // Upload Admin Avatar
            if($request->hasFile('admin_image')){
                $imgTmp = $request->file('admin_image');
                if($imgTmp->isValid()){

                    $ext = $imgTmp->getClientOriginalExtension();
                    $imgName = md5(rand(1111, 9999)) . '.' . $ext;
                    $imgPath = 'admin/images/photos/' . $imgName;
                    //Image::make($imgTmp)->save($imgPath);
                    Image::make($imgTmp)->save($imgPath);
                }
            } else if (!empty($data['current_admin_image'])){
                $imgName = $data['current_admin_image'];
            } else {
                $imgName = "";
            }

            Admin::where('id',Auth::guard('admin')->user()->id)->update(
                ['name'=>$data['admin_name'],'mobile'=>$data['admin_mobile'],'image'=>$imgName]
            );
            return redirect()->back()->with('success_message',"Admin Details Update Successfully");
        }
        return view('admin.settings.update_admin_details');
    }

    public function updateVendorDetails($slug,Request $request){
       Session::put('page', 'update_'.$slug.'_details');
       if($slug == 'personal'){
            if($request->isMethod('post')){
                $data = $request->all();
                $rules = [
                    'vendor_name'=>'required|regex:/^[\pL\s\-]+$/u',
                    'vendor_mobile'=>'required|numeric',
                ];
                $customMessage = [
                    'vendor_name.required' => 'Name is required',
                    'vendor_name.regex' => 'Valid Name is required',
                    'vendor_mobile.required' => 'Mobile is required',
                    'vendor_mobile.regex' => 'Valid Mobile is required',
                ];
                $this->validate($request,$rules,$customMessage);

                // Upload Admin Avatar
                if($request->hasFile('vendor_image')){
                    $imgTmp = $request->file('vendor_image');
                    if($imgTmp->isValid()){

                        $ext = $imgTmp->getClientOriginalExtension();
                        $imgName = md5(rand(1111, 9999)) . '.' . $ext;
                        $imgPath = 'admin/images/photos/' . $imgName;
                        //Image::make($imgTmp)->save($imgPath);
                        Image::make($imgTmp)->save($imgPath);
                    }
                } else if (!empty($data['current_vendor_image'])){
                    $imgName = $data['current_vendor_image'];
                } else {
                    $imgName = "";
                }

                Admin::where('id',Auth::guard('admin')->user()->id)->update(
                    ['name'=>$data['vendor_name'],'mobile'=>$data['vendor_mobile'],'image'=>$imgName]
                );
                Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->update(
                    [
                        'name'=>$data['vendor_name'],
                        'mobile'=>$data['vendor_mobile'],
                        'address'=>$data['vendor_address'],
                        'city' => $data['vendor_city'],
                        'state' => $data['vendor_state'],
                        'country'=>$data['vendor_country'],
                        'pincode'=>$data['vendor_pincode'],
                    ]
                );
                return redirect()->back()->with('success_message',"Admin Details Update Successfully");
            }
            $vendorDetails = Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();

       } else if ($slug == 'business') {

        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'shop_name'=>'required|regex:/^[\pL\s\-]+$/u',
                'shop_address'=>'required|regex:/^[\pL\s\-]+$/u',
                'shop_mobile'=>'required|numeric',
                'address_proof'=>'required',
            ];
            $customMessage = [
                'shop_name.required' => 'Name is required',
                'shop_name.regex' => 'Valid Name is required',
                'shop_address.required' => 'Address is required',
                'shop_address.regex' => 'Valid Address is required',
                'shop_mobile.required' => 'Mobile is required',
                'shop_mobile.regex' => 'Valid Mobile is required',
                'address_proof.required' => 'Address Proof  is required',
                'address_proof.regex' => 'Valid Address Proof  is required',
            ];

            $this->validate($request,$rules,$customMessage);

            // Upload Admin Avatar
            if($request->hasFile('address_proof_image')){
                $imgTmp = $request->file('address_proof_image');
                if($imgTmp->isValid()){

                    $ext = $imgTmp->getClientOriginalExtension();
                    $imgName = md5(rand(1111, 9999)) . '.' . $ext;
                    $imgPath = 'admin/images/proofs/' . $imgName;
                    //Image::make($imgTmp)->save($imgPath);
                    Image::make($imgTmp)->save($imgPath);
                }
            } else if (!empty($data['current_address_proof_image'])){
                $imgName = $data['current_address_proof_image'];
            } else {
                $imgName = "";
            }

            VendorsBusinessDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->update(
                [
                    'shop_name'=>$data['shop_name'],
                    'shop_address'=>$data['shop_address'],
                    'shop_city'=>$data['shop_city'],
                    'shop_state' => $data['shop_state'],
                    'shop_country' => $data['shop_country'],
                    'shop_mobile'=>$data['shop_mobile'],
                    'shop_website'=>$data['shop_website'],
                    'shop_email'=>$data['shop_email'],
                    'business_license_number'=>$data['business_license_number'],
                    'gst_number'=>$data['gst_number'],
                    'pan_number'=>$data['pan_number'],
                    'address_proof'=>$data['address_proof'],
                    'address_proof_image'=>$imgName,

                ]
            );
            return redirect()->back()->with('success_message',"Vendor Business Details Updated Successfully");
        }
            $vendorDetails = VendorsBusinessDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();


       } else if ($slug == 'bank') {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $rules = [
                    'account_holder_name'=>'required|regex:/^[\pL\s\-]+$/u',
                    'bank_name'=>'required|regex:/^[\pL\s\-]+$/u',
                    'account_number'=>'required|numeric',
                    'bank_ifsc_code'=>'required',
                ];
                $customMessage = [
                    'account_holder_name.required' => 'Account Holder Name is required',
                    'account_holder_name.regex' => 'Valid Account Holder Name is required',
                    'bank_name.required' => 'Bank Name is required',
                    'bank_name.regex' => 'Valid Bank Name is required',
                    'account_number.required' => 'Account Number is required',
                    'account_number.regex' => 'Valid Account Number is required',
                    'bank_ifsc_code.required' => 'Bank Ifsc Code  is required',
                    'bank_ifsc_code.regex' => 'Valid Bank Ifsc Code  is required',
                ];

                $this->validate($request,$rules,$customMessage);


                VendorsBankDetails::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->update(
                    [
                        'account_holder_name' => $data['account_holder_name'],
                        'bank_name' => $data['bank_name'],
                        'account_number' => $data['account_number'],
                        'bank_ifsc_code' => $data['bank_ifsc_code'],
                    ]
                );

                return redirect()->back()->with('success_message',"Vendor Business Details Updated Successfully");

            }
            $vendorDetails = VendorsBankDetails::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();


       }
        $countries = Country::where('status',1)->get()->toArray();
        return view('admin.settings.update_vendor_details')->with(compact('slug','vendorDetails','countries'));
    }

    public function admins($type=null){
        $admins = Admin::query();
        $reflect = [
            'vendors'=>'vendor',
            'subadmins'=>'subadmin',
            'admins'=>'admin',
        ];

        if(isset($reflect[$type])) {
            $admins->where('type', $reflect[$type]);
            $title = ucfirst($reflect[$type]);
            Session::put('page', 'view_'. strtolower($type));
        } else {
            $title = "All Admins|Subadmins|Vendors";
            Session::put('page', 'view_all');
        }
        $admins = $admins->get()->toArray();

        return view('admin.admins.admins')->with(compact('admins','title'));
    }

    public function viewVendorDetails($id) {
        $vendorDetails = Admin::with('vendorPersonal','vendorBusiness','vendorBank')->where('id', $id)->first();
        $vendorDetails = json_decode(json_encode($vendorDetails),true);
        //dd($vendorDetails);
        return view('admin.admins.view_vendor_details')->with(compact('vendorDetails'));
    }

    public function updateAdminStatus(Request $request) {
        if($request->ajax()){
            $data = $request->all();
            if ($data['status'] == 'Active') {
                $status = 0;
            } else {
                $status = 1;
            }
            DB::enableQueryLog();
            $res=Admin::where('id', $data['admin_id'])->update(['status'=>$status]);
            DB::getQueryLog();
            return response()->json(['status'=>$status,'admin_id'=>$data['admin_id'],'res'=>$res]);
        }
    }
}
