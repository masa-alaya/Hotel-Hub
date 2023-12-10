<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            "id" => $this->id,
            "address" => AddressResource::make($this->address()->withTrashed()->first()),
            "user_phone" => $this->user()->first()->phone,
            "meals" => $this->meals()->get(),
            "total_price" => $this->total_price,
            "status" => $this->status,
            "notes" => $this->notes,
            "ordered_at" => $this->created_at->diffForHumans()
        ];
    }
}
