@extends('layouts.main')
@section('title','Danh sách thể loại')
@section('content')
    <style type="text/css">
        form{
            width: 100%;
            margin:  0px auto;
            font-family: "Times New Roman";
        }
        .btn{
            padding: 7px 23px;
            margin-top: 10px;
            margin-left: 0;
        }
        .form-control{
            margin: 0;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3 style="text-align: center;">Add New Product Type</h3>
            </div>
            <div class="col-md-12">
                @if(session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <strong>Lỗi</strong> Đã có lỗi xảy ra vui lòng kiểm tra <br>
                        <ul>
                            @foreach($errors->all() as $errors)
                                <li style="color: red;">{{ $errors}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <form action="{{URL::route('category.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ !empty($data) ? $data->id : '' }}">
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Name:</label>
                    <input class="form-control" type="text" name="name" value="{{ !empty($data) ? $data->name : '' }}" placeholder="Please enter name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Description: </label>
                        <textarea class="form-control ckeditor" type="text" name="description"  id="editor1" placeholder="Please enter description" rows="4">{{ !empty($data) ? $data->description : '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <label> Image_path:</label>
                    <input class="form-control" type="file" name="image"  id="file-input" placeholder="Please enter choose image">
                    <div id='img_contain'>
                        <img id="image-preview" align='middle'src="{{ (!empty($data) && !empty($data->image)) ? asset('uploads/category'.$data->image) : asset('backend/image/icon-image.png') }}" alt="your image" title=''/>
                    </div>
                    <input type="hidden" name="image_hd" value="{{ !empty($data) ? $data->image : '' }}" id="input_image_hd">
                </div>
                <div class="col-md-12">
                    <label>Category:</label>
                    <select required name="category" class="col-md-12 form-control" >
                        @foreach(config('dev.category') as $key => $value)
                            <option value="{{ $key }}" @if(!empty($data) && $data->category == $key) selected @endif> {{ $value }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-sm btn-success" >Add New</button>
                    <a class="btn btn-sm btn-danger" href="{{route('category.create')}}">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
