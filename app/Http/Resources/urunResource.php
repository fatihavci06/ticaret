<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class urunResource extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->urun_adi //category_name product_category modelinde tanımlı ilişkidir
           
        ];
    }
}
