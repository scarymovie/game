<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $rules = [
            'id' => $this->id,
            'name' => $this->name,
        ];

        if (!empty( $this->user->name)){
            $rules = [
                'id' => $this->id,
                'name' => $this->name,
                'username' => $this->user->name,
            ];
        }

        return $rules;
    }
}
