<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('backend/css/fontawesome.min.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('backend/css/all.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{asset('backend/js/main.js')}}}" type="text/css"></script>
    <script src="{{asset('backend/js/jquery.min.js')}}"></script>
</head>
<style type="text/css">
    .box{
        width:600px;
        margin: 0 auto;
        margin-top: 40px;
        border: 1px solid #ccc;
    }

</style>
<body>
<div class="container box">
    <h3 style="text-align:center; margin-top: 10px;">Login</h3>
    <hr>
        <form action="" method="" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="csrf_token">
            <div class="form-group">
                <label>Username:</label>
                <input class="form-control" type="text" name="username" style="width: 490px;">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input class="form-control" type="password" name="password" style="width: 490px;">
            </div>
            <a href="#">Logout</a>
                <button class="btn btn-sm btn-danger" style="margin-left: 250px;">Sign in</button>

        </form>
</div>
</body>
</html>
