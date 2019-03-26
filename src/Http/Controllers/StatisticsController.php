<?php namespace SamJoyce777\LaravelLogger\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SamJoyce777\LaravelLogger\Managers\DrilldownManager;
use SamJoyce777\LaravelLogger\Managers\StatisticsManager;

class StatisticsController extends Controller
{
    protected $statistics_manager;

    protected $drilldown_manager;

    public function __construct()
    {
        $this->statistics_manager = new StatisticsManager();

        $this->drilldown_manager = new DrilldownManager();
    }

    public function index()
    {
        $start_date = Carbon::now()->startOfDay();

        $end_date = Carbon::now()->endOfDay();

        $statistics = $this->statistics_manager->getStatistics($start_date, $end_date);
        return view('laravel-logger::statistics.index')
            ->with('statistics', $statistics)
            ->with('start_date', $start_date)
            ->with('end_date', $end_date);
    }

    public function indexPost(Request $request)
    {
        $start_date = Carbon::createFromFormat('Y-m-d', $request->get('start_date'))->startOfDay();

        $end_date = Carbon::createFromFormat('Y-m-d', $request->get('end_date'))->endOfDay();

        $statistics = $this->statistics_manager->getStatistics($start_date, $end_date);

        return view('laravel-logger::statistics.index')
            ->with('statistics', $statistics)
            ->with('start_date', $start_date)
            ->with('end_date', $end_date);
    }

    public function drilldown(Request $request)
    {
        $logs = $this->drilldown_manager->getSummary($request->get('channel'), $request->get('level'), Carbon::createFromFormat('Y-m-d', $request->get('start_date'))->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->get('end_date'))->endOfDay());

        return response()->json([
            'request' => $request->all(),
            'logs' => $logs,
            'content' => [
                'title' => 'Drilldown: ' . ucwords($request->get('channel')) . ' Level: ' . $request->get('level'),
                'html' => view('laravel-logger::statistics.drilldown')->with('logs', $logs)->render()
            ]
        ]);
    }

    public function drilldownDetail(Request $request)
    {
        $logs = $this->drilldown_manager->getDetail($request->get('message'), Carbon::createFromFormat('Y-m-d', $request->get('start_date'))->startOfDay(), Carbon::createFromFormat('Y-m-d', $request->get('end_date'))->endOfDay());

        return response()->json([
            'request' => $request->all(),
            'logs' => $logs,
            'content' => [
                'title' => 'Details',
                'html' => view('laravel-logger::statistics.drilldown-detail')->with('logs', $logs)->render()
            ]
        ]);
    }
}
