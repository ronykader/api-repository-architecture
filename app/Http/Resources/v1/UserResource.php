<?php

namespace App\Http\Resources\v1;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'source' => $this->source,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s a'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d H:i:s a'),
        ];
    }
}
