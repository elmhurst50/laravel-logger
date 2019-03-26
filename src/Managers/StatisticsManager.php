<?php namespace SamJoyce777\LaravelLogger\Managers;

use Carbon\Carbon;
use SamJoyce777\LaravelLogger\Models\Log;

class StatisticsManager {

    public function getChannels()
    {
        $groups = Log::groupBy('channel')->pluck('channel');

        return $groups;
    }

    public function getStatistics(Carbon $start_date, Carbon $end_date)
    {
        return Log::select([
            \DB::raw('channel'),
            \DB::raw('SUM(CASE WHEN level = 100 THEN 1 ELSE 0 END) AS qty_debug'),
            \DB::raw('SUM(CASE WHEN level = 200 THEN 1 ELSE 0 END) AS qty_info'),
            \DB::raw('SUM(CASE WHEN level = 400 THEN 1 ELSE 0 END) AS qty_error'),
            \DB::raw('SUM(CASE WHEN level = 500 THEN 1 ELSE 0 END) AS qty_critical'),
            \DB::raw('SUM(CASE WHEN level = 600 THEN 1 ELSE 0 END) AS qty_emergency'),
        ])
            ->whereBetween('created_at', [$start_date->format('Y-m-d H:i:s'), $end_date->format('Y-m-d H:i:s')])
            ->groupBy('channel')
            ->get();
    }
}