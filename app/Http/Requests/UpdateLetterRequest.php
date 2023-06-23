<?php

namespace App\Http\Requests;

use App\Enums\LetterType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLetterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function attributes(): array
    {
        return [
            'nomor_wa' => __('model.letter.agenda_number'),
            'nik' => __('model.letter.nik'),
            'kkt' => __('model.letter.kkt'),
            'nama_ketua' => __('model.letter.nama_ketua'),
            'from' => __('model.letter.from'),
            'to' => __('model.letter.to'),
            'email' => __('model.letter.email'),
            'received_date' => __('model.letter.received_date'),
            'letter_date' => __('model.letter.letter_date'),
            'description' => __('model.letter.description'),
            'note' => __('model.letter.note'),
            'classification_code' => __('model.letter.classification_code'),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'nomor_wa' => ['required'],
            'nik' => ['required'],
            'kkt' => ['required'],
            'nama_ketua' => ['required'],
            'from' => [Rule::requiredIf($this->type == LetterType::INCOMING->type())],
            'to' => [Rule::requiredIf($this->type == LetterType::OUTGOING->type())],
            'email' => ['required', Rule::unique('letters', 'email')->ignore($this->id)],
            'received_date' => ['required'],
            'letter_date' => ['required'],
            'description' => ['required'],
            'note' => ['nullable'],
            'classification_code' => ['required'],
        ];
    }
}
