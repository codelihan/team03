<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStoreRequest extends FormRequest
{
    /**
     * 確定用戶是否有權發出此請求。
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 獲取應用於請求的驗證規則。
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:255',
            'country' => 'required|string|min:2|max:255',
            'service' => 'required|integer|min:0',
            'info' => 'required|string',
            'url' => 'required|url',
        ];
    }

    /**
     * 獲取應用於請求的自定義錯誤消息。
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'name.required' => '請輸入車商名稱',
            'name.string' => '車商名稱必須為字串',
            'name.min' => '車商名稱必須大於2個字',
            'name.max' => '車商名稱必須小於255個字',
            'country.required' => '請輸入地區',
            'country.string' => '地區必須為字串',
            'country.min' => '地區必須大於2個字',
            'country.max' => '地區必須小於255個字',
            'service.required' => '請輸入據點數量',
            'service.integer' => '據點數量必須為整數',
            'service.min' => '據點數量必須大於0',
            'info.required' => '請輸入簡介',
            'info.string' => '簡介必須為字串',
            'url.required' => '請輸入網址',
            'url.url' => '網址格式不正確',
        ];
    }
}
