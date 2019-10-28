@extends('layouts.main')
@section('title','Chi tiết sản phẩm')
@section('content')
    <div class="row px-5 mb-4">
        <div class="col-md-12">
            <h3>Chi tiết sản phẩm</h3>
        </div>
        <div class="row px-5">
            <table style="font-family: 'Times New Roman';font-size: 20px;">
                <tr>
                    <th>Tên sản phẩm:</th>
                </tr>
                <tr>
                    <th>Số lượng sản phẩm:</th>
                </tr>
                <tr>
                    <th>Mô tả:</th>
                </tr>
                <tr>
                    <th>Hình ảnh:</th>
                </tr>
                <tr>
                    <th>Giá sản phẩm:</th>
                </tr>
                <tr>
                    <th>Trạng thái:</th>
                </tr>
            </table>
        </div>
    </div>
    @endsection
