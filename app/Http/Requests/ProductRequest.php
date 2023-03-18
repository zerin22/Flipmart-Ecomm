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
     * @return array<string, mixed>
     */
    public function rules()
    {
        if(request()->routeIs('products.store'))
        {
            $imageValidation = 'required';
        }elseif(request()->routeIs('products.update'))
        {
            $imageValidation = '';
        }
        return [
            "category_id" => "required",
            "subcategory_id" => "required",
            "product_name_en" => "required",
            "product_name_bn" => "required",
            "product_slug_en" => "required",
            "product_slug_bn" => "required",
            "product_tags_en" => "required",
            "product_tags_bn" => "required",
            "product_title_en" => "required",
            "product_title_bn" => "required",
            "product_code" => "required",
            "product_qty" => "required",
            "selling_price" => "required",
            "product_thumbnail" => $imageValidation,
        ];
    }

    public function messages()
    {
        return [
        "category_id.required" => "Field is required",
        "subcategory_id.required" => "Field is required",
        "product_name_en.required" => "Field is required",
        "product_name_bn.required" => "Field is required",
        "product_slug_en.required" => "Field is required",
        "product_slug_bn.required" => "Field is required",
        "product_tags_en.required" => "Field is required",
        "product_tags_bn.required" => "Field is required",
        "product_title_en.required" => "Field is required",
        "product_title_bn.required" => "Field is required",
        "product_code.required" => "Field is required",
        "product_qty.required" => "Field is required",
        "selling_price.required" => "Field is required",
        "product_thumbnail.required" => "Field is required",
        ];
    }
}
