@extends('layouts.main')
@section('title','chi tiết thể loại')
@section('content')
    <div class="row px-5 mb-4">
        <div class="row px-5">
            <div class="col-md-12">
                <h3>Detail Product Type</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Name : </strong>{{$category->name}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Content : </strong>{{$category->description}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Content : </strong>
                    @if(!empty($category['image']))
                        <img src="{{ asset('uploads/' . $category['image']) }}" width="80px"/>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Content : </strong>{{$category->category}}
                </div>
            </div>
            <div class="col-md-12">
                <a href="{{route('category.index')}}" class="btn btn-sm bg-success">Back</a>
            </div>
        </div>
    </div>
    @endsection
