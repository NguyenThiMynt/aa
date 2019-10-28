@extends('layouts.main')
@section('title','Thêm sản phẩm')
@section('content')
    <style type="text/css">
        form {
            width: 100%;
            font-family: "Times New Roman";
        }

        .btn {
            padding: 10px 23px;
            margin-top: 10px;
            margin-left: 15px;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center;">Add New Product</h3>
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
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="col-md-12">
                <label>Name:</label>
                <input class="form-control" type="text" name="name" placeholder="Please enter name">
            </div>
            <div class="col-md-12">
                <label> Image:</label>
                <input class="form-control" type="file" name="image" id="file-input"
                       placeholder="Please enter choose image">
                <div id='img_contain'>
                    <img id="image-preview" align='middle'
                         src="{{ (!empty($data) && !empty($data->image)) ? asset('uploads/product'.$data->image) : asset('backend/image/icon-image.png') }}"
                         alt="your image" title=''/>
                </div>
                <input type="hidden" name="image_hd" value="{{ !empty($data) ? $data->image : '' }}"
                       id="input_image_hd">
            </div>
            <div class="col-12 form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Price:</label>
                        <input class="form-control" type="number" name="price"
                               value="{{!empty($data) ? $data->price : ''}}"
                               placeholder="Please enter price">
                    </div>
                    <div class="col-md-6">
                        <label>Discount: </label>
                        <input class="form-control" name="discount" type="text"
                               value="{{!empty($data) ? $data->discount : ''}}"
                               placeholder="Please enter sale price if available">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label>Quantity:</label>
                <input class="form-control" type="number" name="quantity" min="0" max="200"
                       value="{{!empty($data) ? $data->quantity : ''}}" placeholder="Please enter quantity">
            </div>
            <div class="col-md-12">
                <label>Description</label>
                <textarea class="form-control ckeditor" type="text" name="description"
                          placeholder="">{{!empty($data) ? $data->descriptio : ''}}</textarea>
            </div>
            <div class="col-md-12">
                <label>Category</label>
                <select required name="category" class="form-control">
                    @foreach(config('dev.category') as $key => $value)
                        <option value="{{ $key }}"
                                @if(!empty($data) && $data->category == $key) selected @endif> {{ $value }} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <label>Active: </label>
                <input type="checkbox" name="active" value="{{!empty($data) ? $data->active:''}}">
            </div>
            <div class="col-md-12">
                <button class="btn btn-sm btn-success" type="submit">Add New</button>
                <a class="btn btn-sm btn-danger" href="{{route('product.create')}}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
