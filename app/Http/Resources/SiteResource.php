<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['id'],
            'name' => $this['name'],
            'url' => $this['url'],
            'comment' => $this['comment'],
            'user_id' => $this['user_id'],
            'created_at' => $this['created_at'],
            'updated_at' => $this['updated_at'],
            'pages' => PageResource::collection($this['pages'])
        ];
    }
}
