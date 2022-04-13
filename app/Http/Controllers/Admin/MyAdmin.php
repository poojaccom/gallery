<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\AdminUser;
// use App\Models\AdminUser as ModelsAdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;

class MyAdmin extends Controller
{
    public function admin_register()  
    {

        $user_data = AdminUser::count();
        if($user_data > 0){
            return redirect()->route('admin.login');
        }
        
        $data = [];
        return $this->_display('Admin.admin_register', $data);
    }
    public function _display($view, $data  = []) 
    {
        return view($view, $data); 
    } 
    
    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function admin_save(Request $request)
    {
        
       $req_data = $request->input(); // data from input fields
    
       $new_admin = new AdminUser(); // model name
       $new_admin->name = $req_data['admin_name'];
       $new_admin->email = $req_data['admin_email'];
       $new_admin->password = Hash::make($req_data['admin_password']); 
       $new_admin->reset_token = $this->generateRandomString(10); 
       $new_admin->created_at = date('Y-m-d H:i:s');
       $new_admin->save();

       return redirect()->route('admin.reg'); 
    }
    public function login_admin() 
    {
        
        $data = [];
        return $this->_display('Admin.login_admin', $data);

    }
    public function login_admin_check(request $request)
    {

        // print_r($_POST);
        $req_data = $request->input();
        $admin_email = $req_data['admin_email'];
        $admin_password = $req_data['admin_password']; 
        
        if(Auth::guard('admin')->attempt(['email'=>$admin_email,'password'=>$admin_password])){
            echo '<a href="'.route('admin.logout').'">logout</a>';
              return redirect()->route('category.list');
        }else{
            
             return redirect()->route('admin.reg'); 
        }

    }
     public function reset_password() 
    {
        
        $data = [];
        return $this->_display('Admin.reset', $data); 

    }
    

    public function save_reset(request $request)
    {
        $req_data = $request->input(); 
        
         $admin_data = AdminUser::where('email',$req_data['admin_email'])->first();
        $token=$admin_data->reset_token;
         $email=$req_data['admin_email'];
    
       

    
     $data = array('name'=>$admin_data->name,'reset_token'=>$token,'email'=>$email);
      Mail::send('mail', $data, function($message) use($data){
         $message->to($data['email'], 'Tutorials Point')->subject 
            ('Laravel HTML Testing Mail');
         $message->from('Pmjadhav94.pj@gmail.com','pooja jadhav');
      });
      echo "HTML Email Sent. Check your inbox."; 
     
     
       

    }
    public function reset_token($reset_token)
    {

        $admin_data = AdminUser::where('reset_token',$reset_token)->first();
        $data['admin_data']=$admin_data;
        // $data = [];
        return $this->_display('Admin.reset_form', $data); 
    }

    public function update_password(request $request) 
    {
        $req_data = $request->input(); // data from input fields

    
        $new_admin = AdminUser::where('reset_token',$req_data['reset_token'])->first();
        $new_admin->password = Hash::make($req_data['new_pass']);
        $new_admin->updated_at = date('Y-m-d H:i:s');
        $new_admin->save();
    }

}
