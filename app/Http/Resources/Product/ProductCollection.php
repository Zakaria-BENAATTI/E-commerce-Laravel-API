<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'discount'=>$this->discount,
            'totalPrice'=> round($this->price *(1-$this->discount/100),2),//730*(1-10/100)=730*0.9=659dh
            'rating' => $this->reviews->count()>0 ? round($this->reviews->sum('star')/$this->reviews->count(),2)
            : 'NO RATING YET',
            'href'=>[
                'link'=>route('products.show',$this->id)
            ]
        ];
    }
}
