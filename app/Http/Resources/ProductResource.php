<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'price' => $this->price,
            'category' => CategoryResource::collection(
                $this->whenLoaded('category')
            )
            // 'category' => $this->when(
            //     $request->user()->tokenCan('roll:admin'),
            //     $this->category->name
            // ),
        ];
    }
}
