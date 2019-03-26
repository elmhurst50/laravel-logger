<script>
    $(document).ready(function () {
        $('.js-view-logs').click(function (e) {
            e.preventDefault();

            var data = {
                _token: csrf(),
                channel: $(this).data('channel'),
                level: $(this).data('level'),
                start_date: $('#start_date').val(),
                end_date: $('#end_date').val(),
            }

            console.log(data);

            $.post('/admin/laravel-logger/statistics/drilldown', data, function (response) {
                console.log(response);

                $('.js-drilldown-content').html(response.content.html);

                $('.js-drilldown-title').html(response.content.title);

                $('.table').bootstrapTable();

                $('#drilldownModal').modal('show');

                $('[data-toggle="popover"]').popover();
            });

        });

        $('body').on('click', '.js-view-detail', function (e) {
            e.preventDefault();

            var data = {
                method: $(this).data('method'),
                _token: csrf(),
                message: $(this).html(),
                start_date: $('#start_date').val(),
                end_date: $('#end_date').val(),
            }

            $.post('/admin/laravel-logger/statistics/drilldown-detail', data, function (response) {
                console.log(response);

                $('.js-detail-content').html(response.content.html);

                $('.js-detail-title').html(response.content.title);

                $('.table').bootstrapTable();

                $('#detailModal').modal('show');

                $('[data-toggle="popover"]').popover();
            });
        });
    });
</script>