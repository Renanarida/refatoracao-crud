<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class StoreMeetingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Ajuste se usar policies
    }


    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after_or_equal:start_time',
            'location' => 'nullable|string|max:255',
            'participants' => 'nullable|array',
        ];
    }
}
