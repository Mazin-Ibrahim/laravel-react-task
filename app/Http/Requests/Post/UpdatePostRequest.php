<?php

namespace App\Http\Requests\Post;

use App\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'status' => 'required',
        ];
    }

    public function update($id)
    {
        $post = Post::findOrFail($id);
        $post->title = $this->input('title');
        $post->body  = $this->input('body');
        $post->status = $this->input('status');
        $post->save();
        return $post;
    }
}
