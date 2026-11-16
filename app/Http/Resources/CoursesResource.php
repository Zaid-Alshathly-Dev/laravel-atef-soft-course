<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoursesResource extends JsonResource
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
        'the_name' => $this->name,
        'the_status' => $this->active ? 'مفعل' : 'غير مفعل'
        ];
        
    } 
}
