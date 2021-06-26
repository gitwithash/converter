<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class ApiStatusResource extends ResourceCollection
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
            'code' => Response::HTTP_OK,
            'success' => true,
            'version' => (int) config('app.api_version', 'unknown'),
            'message' => __('API Status OK.'),
            'data' => $request->all(),
        ];
    }
}
