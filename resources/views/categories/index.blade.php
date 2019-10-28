@extends('layouts.main')
@section('title','Danh sách thể loại')
@section('content')
    <style type="text/css">
        .btn{
            margin-left: 10px;
        }
    </style>
        <div class="row px-5 mb-4">
            <div class="col-sm-6 px-0">
                <h3>List Category</h3>
            </div>
            <div class="col-sm-4">
                <form action="{{ route('category.search') }}" method="get">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="search" name="keyword" value="{{ $keyword }}">
                        <span class="input-group-btn">
                             <button type="submit" class="btn btn-success">Search</button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="col-sm-2 px-0">
                <a class="btn btn-sm btn-primary float-right" href="{{route('category.create')}}">Create new Category</a>
            </div>
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row px-5">
            <table class="table table-bordered " style="text-align: center;">
                <tr class="bg-light">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
                @foreach($categories as $category)
                    <tr>
                        <td class="align-middle">{{$category->id}}</td>
                        <td class="align-middle">{{$category->name}}</td>
                        <td class="align-middle">{{$category->description}}</td>
                        <td class="align-middle">
                            @if(!empty($category['image']))
                                <img src="{{ asset('uploads/category/' . $category['image']) }}" width="80px"/>
                            @endif
                        </td>
                        <?php $categoryText = ''?>
                        @foreach(config('dev.category') as $key => $value)
                            @if($key == $category->category)
                                <?php $categoryText = $value ?>
                            @endif
                            @endforeach
                        <td class="align-middle">{{$categoryText}}</td>
                        <td class="align-middle">
                            <form action="#"  method="post">
                                <a class="btn btn-sm btn-success" href="{{route('category.show',$category->id)}}"><i class="fas fa-info-circle"></i> Show</a>
                                <a class="btn btn-sm btn-warning" href="{{route('category.edit',$category->id)}}"><i class="far fa-edit"></i> Edit</a>
                                <a class="btn btn-sm btn-danger" href="{{route('category.delete',$category->id)}}"><i class="fas fa-trash"></i> Delete</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </table>
            {!! $categories->links() !!}
        </div>
    @endsection
