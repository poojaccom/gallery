<?php

namespace App\Http\Controllers\Admin;  

use App\Http\Controllers\Controller;
use App\Models\Admin\Video;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller     
{

    public function Add_video()
    {


    $cat_data = Category::get();
        
        $data['cat_data'] = $cat_data;
 

        //$data=[];
        return $this->_display('Admin.Video_form',$data); 
    }

    public function save_video(Request $request){
        // $reqdata = $request->input();
        $req_data = $request->input(); 

        
        $new_video=new Video();
        $new_video->title=$req_data['title'];
        $new_video->link=$req_data['link'];
        $new_video->cat_id=$req_data['cat_id'];
        $new_video->created_at = date('Y-m-d H:i:s');
        
         $new_video->save();
         return redirect()->to('/Admin/Add_video'); 

        
    }
    public function video_list()
    {
        $video_data = Video::orderBy('id','desc')->paginate(10);
        
        $data['video_data'] = $video_data;
 

       
        return $this->_display('Admin.Video_list',$data);
    }
    public function edit_video($id)
    {
        $video_data_edit = Video::where('id',$id)->first();
        
        $data['video_data_edit'] = $video_data_edit;
        return $this->_display('Admin.video_edit_form',$data);   
    }
     public function update_video(Request $request)
      {

        $req_data = $request->input();

        $new_video=Video::where('id',$req_data['id'])->first();
        $new_video->title=$req_data['title'];
        $new_video->link=$req_data['link'];
        $new_video->cat_id=$req_data['cat_id'];
        $new_video->updated_at = date('Y-m-d H:i:s');
        
         $new_video->save();
        
         return redirect()->to('/Admin/video/list'); 

      }
      public function delete_video($id)
      {
        Video::where('id', $id)->delete();
        return redirect()->to('/Admin/video/list');
      }


    
    public function _display($view, $data  = [])
    {
        return view($view, $data); 
    }
    
            
            

            
            
            
                        
            
             
            
            
}
