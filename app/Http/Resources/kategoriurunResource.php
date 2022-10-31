<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class kategoriurunResource extends JsonResource
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
            'kategori_id'=>$this->kategori_id ,//category_name product_category modelinde tanımlı ilişkidir
            'kategori_adi'=>new kategoriResource($this->kategori_bilgisi),
            'urun_adi'=>new urunResource($this->urun_bilgisi),
           
        ];
    }
}
