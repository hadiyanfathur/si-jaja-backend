<?php

namespace App\Http\Requests;

use App\Rules\Base64Image;
use Illuminate\Foundation\Http\FormRequest;

class RoadExecutionRequest extends FormRequest
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
            'width' => ['required'],
            'length' => ['required'],
            'cost' => ['required'],
            'executor' => ['required'],
            'executor_contact' => ['required'],
            'start_at' => ['required'],
            'end_at' => ['required'],
            'supervisor' => ['required'],
            'problem' => ['string'],
            'images' => ['array'],
            'images.*' => [new Base64Image]
        ];
    }
}
