<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

/**
 * @property string $title
 * @property string $content
 * @property int $category_id
 * @property int[]|null $tags
 * @property UploadedFile|null $thumbnail
 */
class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'thumbnail' => ['nullable', 'file', 'mimes:jpeg,jpg,png,xlsx'],
            'title' => ['required', 'string', 'min:3'],
            'content' => ['required', 'string'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'tags' => ['nullable', 'array'],
        ];
    }
}
