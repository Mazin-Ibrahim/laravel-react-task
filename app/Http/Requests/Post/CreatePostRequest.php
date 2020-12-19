<?php

namespace App\Http\Requests\Post;

use App\Post;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title' => 'required|string',
            'body'  => 'required|string',
        ];
    }

    public function store()
    {
        $post = new Post();
        $post->title = $this->input('title');
        $post->body  = $this->input('body');
        $post->status = 'active';
        $post->save();
        return $post;
    }
}
