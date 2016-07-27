<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PartnerRequest extends Request
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
            'name' => 'required',
            'desc' => 'max:255',
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Trường :attribute không được trống',
            'max' => 'Trường :attribute không được quá :max kí tự',
            'category_id.required' => 'Bạn chưa chọn danh mục cho bài đăng'
        ];
    }
}
