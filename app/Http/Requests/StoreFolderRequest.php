<?php

namespace App\Http\Requests;

use App\Models\File;
use App\Http\Requests\ParentIdBasedRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreFolderRequest extends ParentIdBasedRequest
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
        return array_merge(parent::rules(),
        [
            'name' => ['required',
            Rule::unique([File::class, 'name'])
                ->where('parent_id', $this->parent_id)
                ->where('created_by', auth()->user()->id)
                ->whereNull('deleted_at')
        ],
        ]);
    }
}
