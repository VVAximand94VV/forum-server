<?php

namespace App\Http\Resources\Forum\Topic;

use Illuminate\Http\Resources\Json\JsonResource;

class TopicForumTreeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'root' => $this->type,
            'children' => self::collection($this->children),
        ];
    }
}
