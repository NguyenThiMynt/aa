@extends('layouts.main')
@section('title','Sửa thể loại')
@section('content')
    <style type="text/css">
        form{
            margin: auto;
            font-family: "Times New Roman";
        }
        .col-md-12{
            width: 500px;
        }
        .btn{
            padding: 7px 23px;
            margin-top: 10px;
        }
    </style>
        <div class="row px-5 mb-4">

            <div class="col-md-12 px-0">
                <h3 style="text-align: center;">Edit Category</h3>
            </div>
            <div class="col-md-12">
                @if(session('messages'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <strong>Lỗi</strong> Đã có lỗi xảy ra vui lòng kiểm tra<br>
                        <ul>
                            @foreach($errors->all() as $errors)
                                <li style="color: red;">{{ $errors}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
            <div class="row px-5">
                <form action="{{route('category.edit',$category->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="col-md-12">
                        <label>Name:</label>
                        <input class="form-control" type="text" name="name" value="{{$category->name}}">
                    </div>
                    <div class="col-md-12">
                        <label>Image_path </label>
                        <input class="form-control" type="file" name="image">
                        @if(!empty($category['image']))
                            <img src="{{ asset('uploads/' . $category['image']) }}" width="80px"/>
                        @endif
                    </div>
                    <a class="btn btn-sm btn-danger" href="{{route('category.index')}}">Cancel</a>
                    <button type="submit" class="btn btn-sm btn-success">Edit</button>
                </form>
            </div>
@endsection

