<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\SprawdzanieWaluty;
use App\Rules\SprawdzanieDaty;

class PokazKursyRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'currency' => [new SprawdzanieWaluty],
            'date' => ['required','date', new SprawdzanieDaty],
        ];
    }
}
