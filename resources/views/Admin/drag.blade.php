<!DOCTYPE html>
<!-- Code By Webdevtrick ( https://webdevtrick.com )--> 
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Drag and Drop List | Webdevtrick.com</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="{{asset('Assets/Admin/style.css')}}">

</head>
<body>
  <h1>DRAG AND DROP</h1>
  <div class="list">
    <input type="text" class="input" placeholder="Add items in your list"/>
    <span class="add">+</span>
  </div>
  <ul>
    <li class="draggable" draggable="true">HTML</li> 
    <li class="draggable" draggable="true">CSS</li>
    <li class="draggable" draggable="true">JavaScript</li>
    <li class="draggable" draggable="true">PHP</li>
    <li class="draggable" draggable="true">MySQL</li>
  </ul>

  <script  src="{{asset('js/Admin/function.js')}}"></script>

</body>
</html>