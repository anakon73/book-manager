<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'author_id' => 'required|exists:authors,id',
            'publication_year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
        ];
    }
}
