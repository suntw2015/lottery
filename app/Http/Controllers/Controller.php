<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getResponseResult($code, $message, $data = null)
    {
        $result = ['code' => $code, 'message' => $message];
        if (!is_null($data)) {
            $result['data'] = $data;
        }
        return $result;
    }

    public function success($data) {
        $code = 0;
        $message = '成功';
        return response()->json($this->getResponseResult($code, $message, $data));
    }
}
