<?php

namespace App\Http\Services;
use App\Model\Lottery;
use Carbon\Carbon;

class LotteryService
{
    const PERIOD_TYPE_CURRENT = 1;
    const PERIOD_TYPE_NEXT = 2;

    public function startOpenTask()
    {
        $lotterys = Lottery::where('status', 0)->where('type', 0)->all();
        foreach ($lotterys as $lottery) {
            
        }
    }

    public function createOpenCode($uuid)
    {
        $lottery = Lottery::find("uuid", $uuid);
        if (empty($lottery)) {
            return [];
        }

        return $this->getRandNumber($lottery->min, $lottery->max, $lottery->count);
    }

    public function getCurrentPeriod($lottery)
    {
        return $this->getPeriod($lottery);
    }

    public function getNextPeriod($lottery)
    {
        return $this->getPeriod($lottery, self::PERIOD_TYPE_NEXT);
    }

    private function getPeriod($lottery, $type = self::PERIOD_TYPE_CURRENT)
    {
        $start = Carbon::createFromFormat("H:i:s", $lottery->start_time);
        $end = Carbon::now();

        $minutes = $end->diffInMinutes($start);
        $periodIndex = ceil($minutes / $lottery->frequency);
        if ($type == self::PERIOD_TYPE_NEXT) {
            $periodIndex++;
        }

        $period = date("Ymd").sprintf("%03d", $periodIndex);
        $periodStart = $start->add($lottery->frequency * $periodIndex, "minute");
        $periodEnd = $periodStart->add($lottery->frequency, "minute");

        return [
            's' => $start->toDateTimeString(),
            'e' => Carbon::now(),
            'period' => $period,
            'start' => $periodStart->toDateTimeString(),
            'end' => $periodEnd->toDateTimeString(),
        ];
    }

    private function getRandNumber($min, $max, $count)
    {
        $res = [];

        if ($max <= $min || ($max-$min+1) < $count) {
            return $res;
        }

        while (count($res) != $count) {
            $tmp = rand($min, $max);
            if (!in_array($res, $tmp)) {
                $res[] = $tmp;
            }
        }

        return $res;
    }
}