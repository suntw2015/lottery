<?php

namespace App\Http\Services\Spiders;

class SpiderResult
{
    private $period;

    private $code;

    private $openTime;

    private $spiderTime;

    public function getPeriod()
    {
        return $this->period;
    }

    public function setPeriod($period)
    {
        $this->period = $period;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getOpenTime()
    {
        return $this->openTime;
    }

    public function setOpenTime($openTime)
    {
        $this->openTime = $openTime;
    }

    public function getSpiderTime()
    {
        return $this->spiderTime;
    }

    public function setSpiderTime($spiderTime)
    {
        $this->spiderTime = $spiderTime;
    }

    public function toArray()
    {
        return [
            'period' => $this->period,
            'code'=> $this->code,
            'openTime' => $this->openTime,
            'spiderime' => $this->spiderTime
        ];
    }

}