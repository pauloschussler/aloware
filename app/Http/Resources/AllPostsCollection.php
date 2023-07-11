<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AllPostsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request)
    {
        return $this->collection->map(function ($post) {
            return [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'created_at' => $post->created_at->format(' M D Y'),
            ];
        });
    }
}
