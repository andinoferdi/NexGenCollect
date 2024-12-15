<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenawaranLelangRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'harga' => 'required|numeric|min:0',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $harga = str_replace('.', '', $this->harga);
        $this->merge([
            'harga' => $harga,
        ]);
    }
}
