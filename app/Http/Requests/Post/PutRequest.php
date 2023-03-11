<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PutRequest extends FormRequest
{    

    // static public function myRules(){
        
    // }

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
        // return $this->myRules();
        // dd($this->route("post"));
        return [
            "name" => "required|min:5|max:255",
            "slug" => "required|min:5|max:255|unique:posts,slug,".$this->route("post")->id,
            "category_id" => "required|integer",
            "posted" => "required",
            "comment" => "required|min:5|max:500"  
        ];
    }
}
