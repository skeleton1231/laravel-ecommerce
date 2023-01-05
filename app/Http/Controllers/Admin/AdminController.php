<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
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

    public function updateAdminPassword(){
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_admin_password')->with(compact('adminDetails'));
    }
}
