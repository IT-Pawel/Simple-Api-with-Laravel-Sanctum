<?php

namespace App\Http\Requests;

use App\Rules\CurrencyRule;
use App\Rules\DateRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreExchangeRequest extends FormRequest
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
            'currency' => ['required', new CurrencyRule],
            'date' => ['required','date', new DateRule],
            'amount' => ['required']
        ];
    }
}
