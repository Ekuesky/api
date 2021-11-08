<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name'=>$this->name,
            'description'=>$this->detail,
            'price'=>$this->price,
            'final_price'=>round((1-($this->discount/100))*$this->price,2),
            'stock'=>$this->stock==0?'Nothing in the stock':$this->stock,
            'discount'=>$this->discount,
            'rating'=>$this->reviews->count()>0 ? round($this->reviews->sum('star')/$this->reviews->count()):'No rating yet',
            'href'=>[
                'reviews'=>route('reviews.index',$this)
            ]
        ];
    }
}
