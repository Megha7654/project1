<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        var data="hello";
     function loadData(){
        //document.getElementById('main').innerHTML=data;
     }     
    </script>
</head>
<body onload="loadData()">

<br>Welcome : {{$admin['name']}}
<br>Role:{{$admin['role']}}
    </h1>
    <ul>
        @foreach($subject as $key)
        <li>{{$key}}</li>
        @endforeach
    </ul>
@if($flag==1)
  <p>Admin access</p>
@else
     <p>Client access</p>
@endif     
</body>
</html>