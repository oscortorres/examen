<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreRequest extends FormRequest
{

    protected function prepareForValidation (){
        $this->merge([
            // 'slug' => Str::slug($this->name),
            // 'slug' => Str::of($this->name)->slug(),
            'slug' => str($this->title)->slug(),
        ]);
    }

    static public function myRules(){
        return [
            "title" => "required|min:5|max:255",
            "slug" => "required|min:5|max:255|unique:posts"
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return $this->myRules();
    }
}
