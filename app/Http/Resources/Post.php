<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'title' => $this->title,
          'body'  => $this->body,
           'status' => $this->status,
          'published_at' => Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans(),
        ];
    }
}
