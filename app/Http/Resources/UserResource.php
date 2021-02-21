<?php

namespace App\Http\Resources;

use App\Models\EmailAddress;
use App\Models\PhoneNumber;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id'=>$this->id,
            'full_nmae'=>$this->full_name,
            'phone_numbers'=>PhoneNumber::where('user_id', $this->id)->get('phone_number'),
            'email_address'=>EmailAddress::where('user_id', $this->id)->get('email_address')
        ];
    }
}
