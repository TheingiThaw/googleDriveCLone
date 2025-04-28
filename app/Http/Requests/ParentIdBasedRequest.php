<?php

namespace App\Http\Requests;

use App\Models\File;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;

class ParentIdBasedRequest extends FormRequest
{
    public ?File $parent = null;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $this->parent = File::query()->where('parent_id', $this->input('parent_id'))->first();
        if($this->parent && $this->parent->isOwned(auth()->user()->id)){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'parent_id' => [
                Rule::exists([File::class, 'id'])
                    ->where(function(Builder $query){
                        return $query->where('is_folder', 1)
                                     ->where('created_by', auth()->user()->id);
                    })
            ],
        ];
    }
}
