<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreForumPostRequest extends FormRequest
{

    public function rules()
    {
        return [
            'nickname' => 'required|string|max:512',
            'date_create' => 'nullable|string',
            'post_text' => 'required|string',
            'carma' => 'nullable|integer',
            'thread_id' => 'required|integer'
        ];
    }
}
