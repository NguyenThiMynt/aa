@extends('layouts.main')
@section('title','Danh sách sản phẩm')
@section('content')
    <style type="text/css">
        .searchbar{
            margin-bottom: auto;
            margin-top: auto;
            height: 40px;
            background-color: #b1dfbb;
            border-radius: 20px;
            padding: 10px;
        }

        .search_input{
            color: white;
            border: 0;
            outline: 0;
            background: none;
            width: 0;
            caret-color:transparent;
            line-height: 20px;
            transition: width 0.4s linear;
        }

        .searchbar:hover > .search_input{
            padding: 0px 0px;
            width: 450px;
            caret-color:red;
            transition: width 0.4s linear;
        }

        .searchbar:hover > .search_icon{
            background: white;
            color: #e74c3c;
        }

        .search_icon{
            height: 40px;
            width: 40px;
            float: right;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            color:white;
        }
    </style>
        <div class="row px-5 mb-4">
            <div class="col-sm-6 px-0">
                <h3>List of products</h3>
            </div>
            <div class="container col-sm-4 px-5 h-100">
                <div class="d-flex justify-content-center h-100">
                    <div class="searchbar">
                        <input class="search_input" type="text" name="" placeholder="Search...">
                        <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 px-0">
                <a class="btn btn-sm btn-primary float-right" href="{{route('product.create')}}">Create new product</a>
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
            <table class="table table-bordered table-hover" style="text-align: center;">
                <tr class="bg-light">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
                @foreach($product as $p)
                    <tr>
                        <td class="align-middle">{{$p->id}}</td>
                        <td>{{$p->name}}</td>
                        <td>
                            @if(!empty($product['image']))
                                <img src="{{ asset('uploads/product/' . $product['image']) }}" width="80px"/>
                            @endif
                        </td>
                        <td>{{$p->price}}</td>
                        <td>{{$p->quantity}}</td>
                        <td>{{$p->discount}}</td>
                        <td>{{$p->description}}</td>
                        <?php $category = ''?>
                        @foreach(config('dev.category') as $key => $value)
                            @if($key == $p->category)
                                <?php $category = $value ?>
                            @endif
                        @endforeach
                        <td>{{$category}}</td>
                        <td>
                            @if($p->active)
                                <i class=" text-success fas fa-check"></i>
                            @else
                                <i class="text-danger fas fa-remove"></i>
                            @endif
                        </td>
                        <td class="align-middle">
                            <form action="#"  method="post">
                                <a class="btn btn-sm btn-success" href="{{route('product.show',$p->id)}}"><i class="fas fa-info-circle"></i> Show</a>
                                <a class="btn btn-sm btn-warning" href="{{route('product.edit',$p->id)}}"><i class="far fa-edit"></i> Edit</a>
                                <a class="btn btn-sm btn-danger" href="{{route('product.delete',$p->id)}}"><i class="fas fa-trash"></i> Delete</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $product->links() !!}
        </div>
    @endsection
