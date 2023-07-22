<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Route;
//use Illuminate\Http\Request;


use Illuminate\Foundation\Http\FormRequest;

class ProductStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $redirect;
    protected $route;
    public function __construct(){
        if(Route::currentRouteName()=='product.store'){
            $this->redirect='product/create';
        }
        else{
           //$this->redirect='product/edit';
        }

    }

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
            'productname'=>'required|unique:product',
            'qty'=>'required|numeric',
            'price'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ];
    }
    public function messages(): array
{
    return [
        'productname.required'=>"Please enter Product Name",
        'productname.unique'=>"Product Name is already taken in database"
           
    ];
}
}
