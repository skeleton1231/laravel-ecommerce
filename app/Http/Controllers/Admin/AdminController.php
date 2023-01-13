<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VendersBusinessDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Vendor;
use Illuminate\Support\Facades\Hash;
use Image;
class AdminController extends Controller
{
    //
    public function dashboard() {
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
            $vendorDetails = VendersBusinessDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();


       } else if ($slug == 'bank') {

       }
        return view('admin.settings.update_vendor_details')->with(compact('slug','vendorDetails'));
    }
}
