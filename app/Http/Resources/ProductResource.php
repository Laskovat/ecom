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
            "name"=>$this->name,
            "desc"=>$this->desc,
            "price"=>$this->price,
            "quantity"=>$this->quantity,
            "category_id"=>$this->category_id,
            "image"=>asset("storage/". $this->image),
        ];
    }
}
