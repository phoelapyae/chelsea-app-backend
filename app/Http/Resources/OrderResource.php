<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'cart' => new CartResource($this->cart),
            'payment' => new PaymentResource($this->payment),
            'status' => $this->status,
            'invoice_no' => $this->invoice_no,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
