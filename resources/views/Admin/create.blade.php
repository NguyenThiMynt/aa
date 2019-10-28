@extends('layouts.main')
@section('title','Thêm mới user')
@section('content')
    <style type="text/css">
        form{
            margin: auto;
        }
       .col-md-12{
           width: 500px;
       }
        .btn{
            padding: 7px 23px;
            margin-top: 10px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 style="text-align: center; margin-top: 40px;">Add New User</h3>
            </div>
            <form action="{{route('')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="csrf_token">
                <div class="col-md-12">
                    <label>Name:</label>
                    <input class="form-control" type="text" name="name" placeholder="Enter Name" >
                </div>
                <div class="col-md-12">
                    <label>Email:</label>
                    <input class="form-control" type="email" name="email" placeholder="Enter Email">
                </div>
                <div class="col-md-12">
                    <label>Address</label>
                    <input class="form-control" type="text" name="address" placeholder="Enter Address">
                </div>
                <div class="col-md-12">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Enter Password">
                </div>
                <div class="col-md-12">
                    <label>Confirm Password</label>
                    <input class="form-control" type="password" name="cfpassword" placeholder="Enter Password">
                </div>
                <div class="col-md-12">
                    <label>Level: </label>
                    <select name="level" class="form-control">
                        <option>Super Admin</option> {{--quyền cao nhất quản lý toàn bộ website--}}
                        <option>Administrator</option> {{--không có quyền đối với website mạng nội bộ--}}
                        <option>Editor</option> {{--đăng bài viết và quản lý bài viết của người dùng khác--}}
                        <option>Contributor</option> {{--chỉ được viết bài viết và không được phép đăng--}}
                        <option>Subscriber</option>{{--quản lý thông tin của mình--}}
                    </select>
                </div>
                <div class="col-md-12">
                    Active:
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" style="margin-left: 10px;">
                </div>
                    <button class="btn btn-sm bg-danger" style=" margin-left: 200px;">Cancel</button>
                    <button class="btn btn-sm bg-success">Save</button>
            </form>
        </div>
    </div>
    @endsection
