<div class="row">
    <div class="col-xs-12 col-md-6"></div>
    <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <form id='date-filter-form' action="{!! route('laravel-logger.statistics.index.post') !!}" method="post" style="width:100%" class="form-inline pull-right">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <select name="prefix_date" id="prefix_date" class="form-control js-prefix-date">
                            <option>Select Prefix Date</option>
                            <option data-start="{!! \Carbon\Carbon::now()->startOfDay()->format('Y-m-d') !!}"
                                    data-end="{!! \Carbon\Carbon::now()->endOfDay()->format('Y-m-d') !!}">Today
                            </option>
                            <option data-start="{!! \Carbon\Carbon::now()->subDay()->startOfDay()->format('Y-m-d') !!}"
                                    data-end="{!! \Carbon\Carbon::now()->subDay()->endOfDay()->format('Y-m-d') !!}">
                                Yesterday
                            </option>
                            <option data-start="{!! \Carbon\Carbon::now()->subDays(7)->startOfDay()->format('Y-m-d') !!}"
                                    data-end="{!! \Carbon\Carbon::now()->endOfDay()->format('Y-m-d') !!}">Last 7 Days
                            </option>
                            <option data-start="{!! \Carbon\Carbon::now()->startOfWeek()->format('Y-m-d') !!}"
                                    data-end="{!! \Carbon\Carbon::now()->endOfDay()->format('Y-m-d') !!}">This week
                            </option>
                            <option data-start="{!! \Carbon\Carbon::now()->subWeek()->startOfWeek()->format('Y-m-d') !!}"
                                    data-end="{!! \Carbon\Carbon::now()->subWeek()->endOfWeek()->format('Y-m-d') !!}">
                                Last week
                            </option>
                            <option data-start="{!! \Carbon\Carbon::now()->previous(\Carbon\Carbon::SUNDAY)->subDays(1)->startOfDay()->format('Y-m-d') !!}"
                                    data-end="{!! \Carbon\Carbon::now()->previous(\Carbon\Carbon::SUNDAY)->endOfDay()->format('Y-m-d') !!}">Last Weekend
                            </option>
                            <option data-start="{!! \Carbon\Carbon::now()->subDays(30)->startOfDay()->format('Y-m-d') !!}"
                                    data-end="{!! \Carbon\Carbon::now()->endOfDay()->format('Y-m-d') !!}">Last 30 Days
                            </option>

                            <option data-start="{!! \Carbon\Carbon::now()->startOfMonth()->format('Y-m-d') !!}"
                                    data-end="{!! \Carbon\Carbon::now()->endOfDay()->format('Y-m-d') !!}">This Month
                            </option>
                            <option data-start="{!! \Carbon\Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d') !!}"
                                    data-end="{!! \Carbon\Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d') !!}">
                                Last Month
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start</label>
                        <input type="text" name="start_date" id="start_date" class="form-control js-datepicker"
                               @if(isset($start_date)) value="{!! $start_date->format('Y-m-d') !!}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End</label>
                        <input type="text" name="end_date" id="end_date" class="form-control js-datepicker"
                               @if(isset($end_date)) value="{!! $end_date->format('Y-m-d') !!}" @endif>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Get Statistics">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>