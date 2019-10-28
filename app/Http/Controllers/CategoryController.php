<?php

namespace App\Http\Controllers;
use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::select('*');
        $keyword = $request->keyword;
        if(!empty($keyword)){
            $query->where('name','like','%'.$keyword.'%');
        }
        $categories = $query->paginate(10);
        //phân trang
        return view('categories.index', ['categories' => $categories, 'keyword' => $keyword]);
    }

    public function create(Request $request)
    {
        $id = $request->id;
        $data = [];
        if(!empty($id)){
            $data = Category::find($id);
        }
        return view('categories.create', ['data' => $data]);
    }
    public function store(CategoryRequest $request)
    {
        $name = $request->name;
        $description = $request->description;
        $category = $request->category;
        $id = $request->id;
        $data =['name' => $name, 'description' => $description, 'category' => $category];
        $imageName = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName =  time() . '_' .$image->getClientOriginalName();
            $image->move(public_path('uploads/category'), $imageName);
        }
        if(!empty($imageName)){
            $data['image'] = $imageName;
        }
        if(!empty($id)){
            Category::where('id', $id)->update($data);
        }else{
            Category::insert($data);
        }
        return redirect('categories/list')->with('message', 'Thêm thể loại thành công');

    }
    public function show($id)
    {
        $category = Category::find($id);
        return view('categories.detail', ['category'=>$category]);
    }
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('categories/list')->with('message', 'Xóa thành công');
    }

}
