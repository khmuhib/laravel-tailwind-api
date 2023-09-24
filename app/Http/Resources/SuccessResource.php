<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuccessResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $response = parent::toArray($request);
        $message = array_key_exists('message', $response) ? $response['message'] : 'Data Retrieved Successfully';
        $data = array_key_exists('data', $response) ? $response['data'] : [];

        return [
            'success' => true,
            'message' => $message,
            'data' => $data
        ];
    }
}
