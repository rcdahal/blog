<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Blog Application</title>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="{{ url('/css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/adm/css/admin.css') }}" />
</head>
<body class="admin">

<?php $catnum = 0; ?>

@if (Route::has('login'))
@auth

<header>
<div class="container">
  <div class="row">
    <div class="col-md-6"><h2>BLog Application</h2></div>
    <div class="col-md-6 text-right" style="margin-top: 10px;">
    <a href="/logout">Log out</a> | 
      
    </div>
  </div>
</div>
</header>



<div class="adminContent">
@yield('contentadmin')
</div>

<div id="deletecat" class="overlay">
    <div class="popup">
      Are you sure you want to delete <span class="catname"></span> category?
            <a class="yes" href="">YES</a>
            <a class="no" href="">NO</a>
    </div>
</div>

<div id="deletequest" class="overlay">
    <div class="popup">
      Are you sure you want to delete this blog?
      <p class="questtitle" style="font-style:italic;"></p>
            <a class="yes" href="">YES</a>
            <a class="no" href="">NO</a>
    </div>
</div>

<script src="{{ url('/js/custom.js') }}" crossorigin="anonymous"></script>

@else
  <div class="row">
    <div class="col-md-12 text-center" style="margin-top: 50px;">To see this page, please: 
        <a href="{{ route('login') }}">Login</a> or
        <a href="{{ route('register') }}">Register</a>
      </div>
    </div>
@endauth
@endif


</body>
</html>