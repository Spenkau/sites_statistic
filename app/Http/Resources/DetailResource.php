<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'page_id' => $this['page_id'],
            'status_code' => $this['status_code'],
            'response_time' => $this['response_time'],
            'created_at' => $this['created_at']
        ];
    }
}
