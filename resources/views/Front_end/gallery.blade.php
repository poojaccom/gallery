<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/fontawesome/4.6.3/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <style>
     .slider-wrap
     {
         position:relative;
         overflow:hidden;
         height:300px;
     }
    
     .slider-main
     {
         position:absolute;
         width:151%;
     }
     .item
     {
         position:relative;
        width:255px;
        display:inline-block;
        height:200px;
        /* background-color: red; */
        margin:10px;
     }
     .text
     {
    position:absolute;
    display:inline-block;
    /* top:50%; */
    /* left:50%; */
    /* transform: translate(-50%, -50%); */
    /* font-size:20px; */
    /* font-weight:bolder; */
    /* color:white; */
    
     }
     .btn-area
     {
        position:absolute;
        bottom:0;
        left:43%;
     }
     .jdfhj
     {
         width:100%;
     }
    
     </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>
<section>
<div class="container">
    <div class="col-md-12">
        <div class="row">
             
            <form action="{{ route('gallery') }}" method="get">
            {{ csrf_field() }}
            <div class="col-md-4">
            <input type="text" class="form-control"  placeholder="Enter title" name="title">

            </div>

            <div class="col-md-4">
            
            <select class="form-control" name="cat_id">
                     
                     <option value="">Select</option>
                     <?php 
                       $req_data = request()->input();
                     foreach($categroy_data as $value)  
                     {
                       ?>
                     <option value="{{ $value->id }}" 
                    @if($value->id == request()->input('cat_id'))
                   selected
                    @endif


                        
                        >{{ $value->cat_name }}</option>
                     <?php } ?>
                     
                    </select>

            </div>

            <div class="col-md-4">
            <button type="submit" class="btn btn-default">Search</button>
            </div>
    </form>

        </div>

    </div>
  
</div>

</section>
  
<section class="hfn">
    <div class="container"> 
    <?php
    $i=1;
    foreach($categroy_data as $value) 
    {
    
      $cntcheck= App\Models\Admin\Video::where('cat_id',$value->id)->count();
      if($cntcheck == 0){
        continue;
      }         
         
    ?>
     <h2 style="margin-left: 48px;">{{ $value->cat_name }}</h2> 
     <div style="text-align: right;margin-right: 75px;"><a href="{{ route('details.page',['id'=>$value->id]) }}">View All</a></div>
     
        <div class="slider-wrap col-md-12">
       
       <!-- ---------------------- my code for content---------------------------- -->
       
            <div class="slider-main" id="slider-main-{{$i}}">
            <!-- <h2 style="margin-left: 48px;">{{ $value->cat_name }}</h2> --> 
            <?php
           $req_data = request()->input();
           $findgal= App\Models\Admin\Video::where('cat_id',$value->id); 
           if(isset($req_data['title']))
          {
              $findgal->where('title', 'like', '%' . $req_data['title'] . '%');
          }
  
  
          // -------------------------------------------------------
  
          if(isset($req_data['cat_id'])) 
          {
              $findgal->where('cat_id', $req_data['cat_id']);
          }
          $findgal = $findgal->orderBy('id','desc')->get();
        
        foreach($findgal as $value_gal)
        {
            ?>
                
           <div class="item col-md-3" >
           <a data-toggle="modal" data-target="#myModal{{$value_gal->id}}">  
            <div class="text" >
            <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal{{$value->id}}">Open Modal</button> -->
        <iframe src="{{$value_gal->link}}"  style="width:100%" ></iframe>
        <h4 class="card-title">{{ $value_gal->title }}</h4>
        <p class="card-text">{{ $value->cat_name }}</p>
       </div>
        </a>
       </div>
       

       <!-- modal start here -->
      
  <div class="modal fade" id="myModal{{$value_gal->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
        <iframe src="{{$value_gal->link}}"  style="width:100%" ></iframe>
        </div>
        <!-- <div class="modal-footer"> -->
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        <!-- </div> -->
      </div>
      
    </div>
  </div>
       <!-- modal end here -->
               
           <?php  } ?>  
        
               
         
            </div>
             <!-- ---------------------- my code for content---------------------------- -->
            

            <div class="btn-area">
                <button type="button" onclick="prev()">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </button>
                <button type="button" onclick="next()">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </button>


            </div>
            

        </div>
        <?php $i++;  } ?>
        <div> 
        {{ $categroy_data->links('pagination::bootstrap-4')}} 
        </div>
       
        
    </div>
    
</section>
<?php

for($k=1; $k<=$i;$k++)
{


?>
<script>
    
    var sliderMain = document.getElementById("slider-main-{{$k}}");
    var item = sliderMain.getElementsByClassName("item");

    function next()
    {

        sliderMain.append(item[0]);
    }
    function prev()
    {

        sliderMain.prepend(item[item.length - 1]);
    }
    </script>
    <?php } ?>

 
    
    
   

</body>
</html>