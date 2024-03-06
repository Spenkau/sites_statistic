<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
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
            'url' => $this['url'],
            'threshold_speed' => $this['threshold_speed'],
            'page_id' => $this['page_id'],
            'site_id' => $this['site_id'],
            'comment' => $this['comment'],
            'created_at' => $this['created_at'],
            'details' => DetailResource::collection($this->whenLoaded('details'))
        ];
    }
}
