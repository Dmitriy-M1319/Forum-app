<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreForumPostRequest extends FormRequest
{

    public function rules()
    {
        return [
            'nickname' => ['string', 'max:512'],
            'date_create' => ['date'],
            'post_text' => ['nullable', 'string'],
            'carma' => ['nullable', 'integer'],
            'thread_id' => ['integer']
        ];
    }
}
