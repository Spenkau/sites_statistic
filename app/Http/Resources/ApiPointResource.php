<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiPointResource extends JsonResource
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
            'request_data' => json_decode($this['request_data']),
            'response_data' => json_decode($this['response_data']),
            'service' => $this['service'],
            'created_at' => $this['created_at'],
            'updated_at' => $this['updated_at'],
            'api_point_history' => ApiPointHistoryResource::collection($this['api_history'])
        ];
    }
}
