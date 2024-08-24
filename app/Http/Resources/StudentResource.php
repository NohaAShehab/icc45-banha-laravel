<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        # reformat data before sending it to the client
        return [
            "id"=>$this->id,
            "name"=>$this->name,
            "image"=> asset("images/students/".$this->image),
            "std_gender"=>$this->gender,
            "created_at"=>$this->created_at,
            "updated_at"=>$this->updated_at,
//            "owner"=>[
//                'name'=>$this->creator ? $this->creator->name : "not found",
//                "id"=>$this->creator_id,
//                "info"=>$this->creator
//            ]
            "student_creator"=> $this->creator ? new CreatorResource($this->creator): null
//            "creator_id"=> $this->creator_id,
//            "creator_name"=>$this->creator ? $this->creator->name: "No info"
        ];
    }
}
