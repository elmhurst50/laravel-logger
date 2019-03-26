<table class="table" data-toggle="table">
    <thead>
    <tr>
        <th data-sortable="true">Date / Time</th>
        <th data-sortable="true">Line</th>
        <th data-sortable="true">File</th>
        <th data-sortable="true">Message</th>
        <th data-sortable="true">Context</th>
        <th data-sortable="true">Instances</th>
        <th data-sortable="true">IP Address</th>
        <th data-sortable="true">URI</th>
        <th data-sortable="true">User</th>
    </tr>
    </thead>
    <tbody>
    @foreach($logs as $log)
        <tr>
            <td>{!! $log->created_at !!}</td>
            <td>{!! $log->line !!}</td>
            <td>{!! $log->file !!}</td>
            <td class="js-view-detail">
                {!! $log->message !!}
            </td>
            <td>{!! $log->context !!}</td>
            <td>{!! $log->instances !!}</td>
            <td>{!! $log->ip_address !!}</td>
            <td>{!! $log->uri !!}</td>
            <td>
                @if(isset($log->User))
                    {!! $log->User->name !!} ({!! $log->User->id !!})
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>