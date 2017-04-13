<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
    public function success($data, $msg = 'success', $code = 0)
    {
        header('Cache-Control:no-cache,must-revalidate');
        header('Pragma:no-cache');
        header('Content-type:application/json');
        $data = [
            'code' => $code,
            'msg' => $msg,
            'data' => changeArrayKey($data)
        ];
        exit(json_encode($data));
    }

    public function error($msg = 'error', $code = 444)
    {
        header('Cache-Control:no-cache,must-revalidate');
        header('Pragma:no-cache');
        header('Content-type:application/json');
        $data = [
            'code' => $code,
            'msg' => $msg,
        ];
        exit(json_encode($data));
    }
}
