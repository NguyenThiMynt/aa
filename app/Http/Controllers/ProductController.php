<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $product = DB::table('products')->join('categories', 'products.category', '=', 'categories.category')->paginate(10);
        return view('products.index', ['product'=>$product]);
}

    public function create(Request $request)
    {
        $id = $request->id;
        $data = [];
        if(!empty($id)){
            $data = Product::find($id);
        }
        return view('products.create',['data'=>$data]);
    }

    public function store(ProductRequest $request)
    {
        $id = $request->id;
        $name = $request->name;
       $price = $request->price;
       $quantity = $request->quantity;
       $description = $request->description;
       $category = $request->category;
       $discount=$request->discount;
       $active = $request->has('active')? 1 : 0;
        $data = ['name'=>$name,'price'=>$price,'quantity'=>$quantity,'description'=>$description, 'discount' => $discount,'category'=>$category,'active'=>$active];
        $imageName = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName =  time() . '_' .$image->getClientOriginalName();
            $image->move(public_path('uploads/product'), $imageName);
        }
        if(!empty($imageName)){
            $data['image'] = $imageName;
        }
        if(!empty($id)){
            Product::where('id', $id)->update($data);
        }else{
            Product::insert($data);

        }
        return redirect('products/list')->with('message', 'Thêm sản phẩm thành công');

    }
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.detail',compact('product'));
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('products/list')->with('message', 'Xóa thành công');
    }
}
