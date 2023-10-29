<?php

namespace App\Http\Requests\Specialist;

use Illuminate\Foundation\Http\FormRequest;

use app\Models\MasterData\Specialist;

use Symfony\Component\HttpFoundation\Response;

class StoreSpecialistRequest extends FormRequest
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
            //
            'name' => [
                'required','string','max:255','unique:specialist'
            ],
            'price' => [
                'required','string','max:255'
            ]
        ];
    }
}
