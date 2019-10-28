<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2024',
            'price' => 'required|numeric',
            'quantity' => 'required',
            'description' => 'required|max:255'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name không được để trống',
            'name.unique' => 'Tên thể loại đã tồn tại',
            'name.min' => 'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
            'name.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
            'image.required' => 'ảnh không được để trống',
            'image.image' => 'upload ảnh phải đứng định dạng',
            'image.mimes' => 'chỉ chấp nhận ảnh với đuôi .jpeg .png .jpg .gif',
            'image.max' => 'ảnh upload dung lượng không > 2M ',
            'price.required' => 'Nhập giá sản phẩm',
            'price.numeric'=>'giá được nhập phải là số',
            'quantity.required' => 'Nhập số lượng sản phẩm',
            'description.required'=>'Mô tả sản phẩm không được để trống'
        ];
    }
}
