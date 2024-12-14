<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NftRequestStore extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_nft' => 'required|string|max:255',
            'file' => 'required|file|mimes:jpg,jpeg,png,mp4,mp3,pdf|max:512000',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:22048',
            'deskripsi' => 'nullable|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'user_id' => 'required|exists:users,id',
            'harga_awal' => 'required|numeric|min:0',
            'status' => 'required|in:available,sold,auction',
        ];
    }

    protected function prepareForValidation(): void
{
    $harga_awal = str_replace('.', '', $this->harga_awal);
    $harga_awal = str_replace('.', '.', $harga_awal);
    $this->merge([
        'harga_awal' => $harga_awal,
    ]);
}
}
