<?php

namespace App\Http\Controllers;

use App\Http\Services\Spiders\SpiderFactory;
use App\Model\Lottery;
use App\Http\Services\LotteryService;

class LotteryController extends Controller
{
    public function index()
    {
        $lottery = Lottery::find(1);
        $res[] = app(LotteryService::class)->getCurrentPeriod($lottery);
        $res[] = app(LotteryService::class)->getNextPeriod($lottery);
        return $this->success($res);
    }
}
