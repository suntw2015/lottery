<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Services\Spiders\SpiderFactory;
use App;

class SpiderServiceTest extends TestCase
{
    public function testAhks()
    {
        $res = app(SpiderFactory::class)->handle('ahk3');
        return $res ? $res->toArray() : [];
    }
}