<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id'=>$this->id, //çağırılan controllerda çekilen id değerini id adında bir kolona atadık.Yani kolon adlarını özelleştirebiliriz. id yerine id3 vs yazılabilir
            'name'=>$this->urun_adi,//çağırılan controllerda çekilen name değerini name adında bir kolona atadık
            'slug'=>$this->slug,//çağırılan controllerda çekilen first_name değerini first_name adında bir kolona atadık
            'is_admin'=>$this->when($this->fiyat==8.933,1) 
           
        ];
    }
}
