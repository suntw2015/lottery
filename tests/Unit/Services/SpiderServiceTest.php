<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Services\Spiders\SpiderFactory;
use App;
use Carbon\Carbon;
use App\Http\Services\LotteryService;
use App\Model\Lottery;

class SpiderServiceTest extends TestCase
{
    public function testAhks()
    {
        $lottery = Lottery::find(1);
        print_r([
            app(LotteryService::class)->getCurrentPeriod($lottery),
            app(LotteryService::class)->getNextPeriod($lottery)
        ]);exit;
    }
}