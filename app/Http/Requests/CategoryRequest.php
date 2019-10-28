<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'description'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2024',
            'image_hd' => 'required',
            'category' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name không được để trống',
            'name.min' => 'Name phải có độ dài tối thiểu là 3 đến tối đa 100 ký tự',
            'name.max' => 'Name phải có độ dài tối thiểu là 3 đến tối đa 100 ký tự',
            'description.required' => 'Description không được để trống',
            'image_hd.required' => 'ảnh không được để trống',
            'image.image' => 'upload ảnh phải đứng định dạng',
            'image.mimes' => 'chỉ chấp nhận ảnh với đuôi .jpeg .png .jpg .gif',
            'image.max' => 'ảnh upload dung lượng không > 2M ',
            'category'=>'Bạn phải chọn danh mục sản phẩm'
        ];
    }
}
