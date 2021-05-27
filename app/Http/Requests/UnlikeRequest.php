<?php

namespace App\Http\Requests;

use App\Http\Requests\LikeRequest;

class UnlikeRequest extends LikeRequest
{
    public function authorize()
    {
        return $this->user()->can('unlike', $this->likeable());
    }
}
