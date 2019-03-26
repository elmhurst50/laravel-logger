<?php namespace SamJoyce777\LaravelLogger\Managers;

use Carbon\Carbon;
use SamJoyce777\LaravelLogger\Models\Log;

class DrilldownManager {

    public function getSummary(string $channel, string $level, Carbon $start_date, Carbon $end_date)
    {
        return Log::select([
            \DB::raw('*'),
            \DB::raw('COUNT(id) AS instances')
        ])
            ->where('channel', $channel)
            ->where('level', $level)
            ->whereBetween('created_at', [$start_date->toDateTimeString(), $end_date->toDateTimeString()])
            ->groupBy('message')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * @param string $message
     * @param Carbon $start_date
     * @param Carbon $end_date
     * @return mixed
     */
    public function getDetail(string $message, Carbon $start_date, Carbon $end_date)
    {
        return Log::select([
            \DB::raw('*'),
        ])
            ->where('message', trim($message))
            ->whereBetween('created_at', [$start_date->toDateTimeString(), $end_date->toDateTimeString()])
            ->orderBy('created_at', 'desc')
            ->get();
    }
}