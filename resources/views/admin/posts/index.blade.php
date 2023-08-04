@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Create</a>
                    <label for="csv" class="btn btn-info mb-0">Import csv</label>
                    <input type="file" name="csv" id="csv" hidden
                           accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                    <nav class="float-right">
                        <ul class="pagination pagination-rounded mb-0" id="pagination">
                        </ul>
                    </nav>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table-data">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Job</th>
                            <th>Location</th>
                            <th>Remotable</th>
                            <th>Is Part-time</th>
                            <th>Range Salary</th>
                            <th>Date Range</th>
                            <th>Status</th>
                            <th>Is Pinned</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            // Crawl Data
            $.ajax({
                url: '{{ route('api.posts') }}',
                dataType: 'json',
                data: {page: '{{request()->get('page')}}' },
                success: function (response) {
                    response.data.data.forEach(function (each) {
                        let location = each.district + ' - ' + each.city;
                        let remotable = each.remotable ? 'x' : '';
                        let is_parttime = each.is_parttime ? 'x' : '';
                        let range_salary = (each.min_salary && each.max_salary) ? each.min_salary + '-' + each.max_salary : '';
                        let range_date = (each.start_date && each.end_date) ? each.start_date + '-' + each.end_date : '';
                        let is_pinned = each.is_pinned ? 'x' : '';
                        let created_at = convertDateToDateTime(each.created_at);

                        $('#table-data').append($('<tr>')
                            .append($('<td>').append(each.id))
                            .append($('<td>').append(each.job_title))
                            .append($('<td>').append(location))
                            .append($('<td>').append(remotable))
                            .append($('<td>').append(is_parttime))
                            .append($('<td>').append(range_salary))
                            .append($('<td>').append(range_date))
                            .append($('<td>').append(each.status))
                            .append($('<td>').append(is_pinned))
                            .append($('<td>').append(created_at))
                        );
                    });
                    renderPagination(response.data.pagination)
                },
                error: function (response) {
                    $.toast({
                        heading: 'Import Failed',
                        text: response.responseJSON.message,
                        showHideTransition: 'slide',
                        position: 'bottom-right',
                        hideAfter: 5000,
                        icon: 'error',
                    });
                }
            })
        });

        $(document).on('click', '#pagination a', function (event) {
            event.preventDefault();

            let page = $(this).text();
            
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('page', page);
            window.location.search = urlParams;
        });

        // Import Csv
        $("#csv").change(function (event) {
            var formData = new FormData();
            formData.append('csv', $(this)[0].files[0]);
            $.ajax({
                url: '{{route('admin.posts.import_csv')}}',
                type: 'POST',
                data: formData,
                dataType: 'json',
                enctype: 'multipart/form-data',
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: (function (response) {
                    $.toast({
                        heading: 'Import Success',
                        text: 'Your data has been imported',
                        showHideTransition: 'slide',
                        position: 'bottom-right',
                        hideAfter: 5000,
                        icon: 'success',
                    });
                }),
                error: (function (response) {

                }),
            })
        });
    </script>
@endpush