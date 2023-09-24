<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ErrorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'error';
    public function toArray($request)
    {
        return [
            'success' => false,
            'message' => 'Error',
            'errors' => parent::toArray($request)
        ];
    }
}
