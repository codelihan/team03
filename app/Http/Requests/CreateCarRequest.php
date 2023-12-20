<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCarRequest extends FormRequest
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
        'sid' => 'required',
        'model' => 'required|string|min:2|max:50',
        'riding_noise' => 'required|numeric|min:0|max:100',
        'idle_noise' => 'required|numeric|min:0|max:100',
        'max_power' => 'required|numeric|min:0|max:300',
        'max_rpm' => 'required|integer|min:0|max:25000',
        'displacement' => 'required|numeric|min:0|max:6300',
        ];
    }

    public function messages()
    {
        return [
            'model.required' => '請輸入型號',
            'model.string' => '型號必須為字串',
            'model.min' => '型號必須大於2',
            'model.max' => '型號必須小於50',
            'riding_noise.required' => '請輸入騎乘噪音值',
            'riding_noise.numeric' => '騎乘噪音值必須為數字',
            'riding_noise.min' => '騎乘噪音值必須大於0',
            'riding_noise.max' => '騎乘噪音值必須小於100',
            'idle_noise.required' => '請輸入怠速噪音值',
            'idle_noise.numeric' => '怠速噪音值必須為數字',
            'idle_noise.min' => '怠速噪音值必須大於0',
            'idle_noise.max' => '怠速噪音值必須小於100',
            'max_power.required' => '請輸入最大動力',
            'max_power.numeric' => '最大動力必須為數字',
            'max_power.min' => '最大動力必須大於0',
            'max_power.max' => '最大動力必須小於300',
            'max_rpm.required' => '請輸入最大動力轉速',
            'max_rpm.integer' => '最大動力轉速必須為數字',
            'max_rpm.min' => '最大動力轉速必須大於0',
            'max_rpm.max' => '最大動力轉速必須小於25000',
            'displacement.required' => '請輸入排氣量',
            'displacement.numeric' => '排氣量必須為數字',
            'displacement.min' => '排氣量必須大於0',
            'displacement.max' => '排氣量必須小於6300',
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $ridingNoise = $this->input('riding_noise');
            $idleNoise = $this->input('idle_noise');

            if ($ridingNoise !== null && $idleNoise !== null && $idleNoise > $ridingNoise) {
                $validator->errors()->add('idle_noise', '怠速噪音不得大於騎乘噪音');
            }
        });
    }

}
