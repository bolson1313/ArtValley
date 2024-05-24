<?php

namespace App\Http\Requests;

use App\Models\Offer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreOfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(Auth::check()){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //artist
            'name' =>   'required|string|max:50',
            'surname' => 'required|string|max:50',

            //artwork
            'title' => 'required|string',
            'file_input' => 'required|mimes:jpeg,png,jpg|max:5048',
            'form' => 'string|in:painting,sculpture,drawing,photography',
            'medium' => 'string|in:pencil,ink,chalk,oil,tempera,watercolor,acrylic,bronze,marble,wood,metal,digital,film,mixed,temporary',
            'size' => 'required|string|max:50',
            'certificate' => 'required',
            'signature' => 'required',

            //offer
            'description' => 'required|string|max:200',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'created_at' => 'date',


        ];
    }
}
