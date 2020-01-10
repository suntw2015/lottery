<?php

namespace App\Http\Controllers;

use App\Http\Services\Spiders\SpiderFactory;
use App\Model\Lottery;

class LotteryController extends Controller
{
    public function index()
    {
        $res = Lottery::all();
        return $this->success($res);
    }
}
