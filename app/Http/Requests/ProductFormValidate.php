<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormValidate extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products',
            'price' => 'required',
            'sale_price' => 'required',
            'details' => 'required',
            'feature_image' => 'required',
            'cate_id' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Mời bạn nhập tên sản phẩm',
                'name.unique' => 'Tên sản phẩm đã tồn tại',
                'price.required' => 'Mời bạn nhập giá sản phẩm',
                'sale_price.required' => 'Mời bạn nhập giá khuyễn mãi sản',
                'details.required' => 'Mời bạn nhập chi tiết sản phẩm',
                'feature_image.required' => 'Mời bạn chọn ảnh sản phẩm',
                'cate_id.required' => 'Mời bạn nhập chọn danh mục sản phẩm',
        ];
    }
}
