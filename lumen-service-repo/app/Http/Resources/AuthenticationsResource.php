<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthenticationsResource extends JsonResource
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
            'token_type' => 'Bearer',
            'expires_in' => $request->expires_in,
            'access_token' => $request->access_token,
            'refresh_token' => $request->refresh_token
        ];
    }
}
