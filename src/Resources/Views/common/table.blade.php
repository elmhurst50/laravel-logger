<table class="table" data-toggle="table">
    <thead>
    <tr>
        <th data-sortable="true">Channel</th>
        <th data-sortable="true" class="text-center">Debug</th>
        <th data-sortable="true" class="text-center">Info</th>
        <th data-sortable="true" class="text-center">Error</th>
        <th data-sortable="true" class="text-center">Critical</th>
        <th data-sortable="true" class="text-center">Emergency</th>
    </tr>
    </thead>
    <tbody>
    @foreach($statistics as $statistic)
        <tr>
            <td>{!! ucwords($statistic->channel) !!}</td>
            <td class="text-center js-view-logs" data-channel="{!! $statistic->channel !!}"
                data-level="100">
                {!! $statistic->qty_debug !!}
            </td>
            <td class="text-center js-view-logs" data-channel="{!! $statistic->channel !!}"
                data-level="200">
                {!! $statistic->qty_info !!}
            </td>
            <td class="text-center js-view-logs @if($statistic->qty_error > 0) danger @else success @endif" data-channel="{!! $statistic->channel !!}"
                data-level="400">
                {!! $statistic->qty_error !!}
            </td>
            <td class="text-center js-view-logs @if($statistic->qty_critical > 0) danger @else success @endif" data-channel="{!! $statistic->channel !!}"
                data-level="500">
                {!! $statistic->qty_critical !!}
            </td>
            <td class="text-center js-view-logs @if($statistic->qty_emergency > 0) danger @else success @endif" data-channel="{!! $statistic->channel !!}"
                data-level="600">
                {!! $statistic->qty_emergency !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>