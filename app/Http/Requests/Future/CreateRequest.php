<?php

namespace App\Http\Requests\Future;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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

    public function userId(): int
    {
        return $this->user()->id;
    }

    public function future(): string
    {
        return $this->input('future');
    }

    public function year(): string
    {
        return $this->input('year');
    }

    public function month(): string
    {
        return $this->input('month');
    }

    public function day(): string
    {
        return $this->input('day');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'future' => 'required|max:140',
            'year'=>'required|max:3000',
            'month'=>'required|max:12',
            'day'=>'required|max:31',
            'images' => 'array|max:4',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|video|mp4|max:2048'
        ];
    }
}