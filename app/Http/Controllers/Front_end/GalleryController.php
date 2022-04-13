<?php

namespace App\Http\Controllers\Front_end;  

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller     
{

  

    public function gallery(Request $request)
    {
        $req_data = $request->input();
       
       
        
        $categroy_data = Category::orderBy('priority','asc')->where('status',1); 

        // $video_data = Video::where('status',1);
       // $findgal= App\Models\Admin\Video::where('cat_id',$value->id)->get(); 
        // -------------------------------------------------------



        // -------------------------------------------------------

        if(isset($req_data['cat_id']))
        {
            $categroy_data->where('id', $req_data['cat_id']);  
        }
       
        // $categroy_data = Category::get();
        
        $data['categroy_data'] = $categroy_data->paginate(3);
        return $this->_display('Front_end.gallery',$data);  
    }

    public function search(Request $request) 
    {
        // $req_data = $request->input();
    //    $rehdbf=Video::where('title', 'like', '%' . $req_data['title'] . '%')->orWhere('cat_id', $req_data['cat_id'])->get();
    //    if(!empty($rehdbf))
    //    {
        //    echo " no result found";
    //    }
       
   
       
    }

    public function details_page($id)  
    {

     $categroy_data = Category::where('id',$id)->where('status',1)->first();
        //$get_is=request()->input('id');
        
        //$data['get_is']=$get_is;
        $data['categroy_data']=$categroy_data;
        return $this->_display('Front_end.details',$data);  

    }

    
    
    public function _display($view, $data  = [])    
    {
        return view($view, $data); 
    }
    
            
            

            
            
            
                        
            
             
            
            
}
