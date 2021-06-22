<?php

namespace App\Http\Requests\Bookmarks;

use App\Models\Bookmark;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookmark extends FormRequest
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
            'type' => 'required|in:' . implode(',', Bookmark::$availableTypes),
            'content' => 'required',
            'is_public' => 'required|boolean',
            'self_destruct_at' => 'sometimes|datetime',
            'tags' => 'required|array',
            'tags.*.id' => 'required|exists:tags,id'
        ];
    }
}
