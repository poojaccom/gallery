<?php

namespace App\Http\Controllers\Admin;  

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class CategoryController extends Controller      
{

    public function Add_category()
    {
        $data=[];
        return $this->_display('Admin.Category_form');  
    }

    public function save_category(Request $request){
        // $reqdata = $request->input();
        $req_data = $request->input();

        
        $new_category=new Category();
        $new_category->cat_name=$req_data['cat_name'];
        $new_category->priority=$req_data['priority'];
        $new_category->created_at = date('Y-m-d H:i:s');  
         $new_category->save();
         return redirect()->to('/Admin/Add_category');  

        
    }

    public function category_list()
    {
        $cat_data = Category::get();
        $data['cat_data'] = $cat_data;

        $cat_data_order = Category::orderBy('priority','asc')->get();
        $data['cat_data_order'] = $cat_data_order;
 
        return $this->_display('Admin.Category_list',$data);
    }
    public function edit_cat($id)
    {
        $cat_data_edit = Category::where('id',$id)->first();
        
        $data['cat_data_edit'] = $cat_data_edit;
        return $this->_display('Admin.edit_form',$data);  
    }
    public function edit_category(Request $request)
    {
        $req_data = $request->input();
        $new_category=Category::where('id',$req_data['id'])->first(); 
        $new_category->cat_name=$req_data['cat_name'];
        $new_category->priority=$req_data['priority'];
        $new_category->updated_at = date('Y-m-d H:i:s'); 
         $new_category->save();
         return redirect()->to('/Admin/category/list');  
        
    }

    public function save_priority(Request $request){
        $req_data = $request->input();
        $priority_ids = isset($req_data['priority']) ? $req_data['priority'] : [];
        // print_r($req_data);
        $i = 1;
        foreach ($priority_ids as $key => $value) {
           $get_cat = Category::where('id',$value)->first(); 
           $get_cat->priority = $i;
           $get_cat->save();
           $i++;
        }
        return redirect()->to('/Admin/category/list'); 
    }

    public function delete_cat($id)
    {
        
        Category::where('id', $id)->delete();
        return redirect()->to('/Admin/category/list'); 
        
    }
    public function drag()
    {
        $data=[];
        return $this->_display('Admin.drag'); 
    }
    
    public function _display($view, $data  = [])  
    {
        return view($view, $data); 
    }
    
            
            

            
            
            
                        
            
             
            
            
}
