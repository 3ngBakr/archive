@push('plugins_css')
    @if (app()->getLocale() == 'ar')
        <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5-rtl.min.css') }}" rel="stylesheet"/>
    @else
        <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"/>
    @endif
    <link href="{{ asset('assets/plugins/datatable/Select-1.3.3/css/select.dataTables.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/datatable/Select-1.3.3/css/select.bootstrap5.min.css') }}" rel="stylesheet"/>
@endpush

@push('plugins_js')
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/Select-1.3.3/js/select.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/Select-1.3.3/js/select.bootstrap5.min.js') }}"></script>
@endpush

@push('scripts')
    <script>
        $(document).ready(function () {
            let languages = {
                'ar': '{{ asset('assets/plugins/datatable/ar.json') }}',
                'en': '{{ asset('assets/plugins/datatable/en.json') }}'
            };

            var table = $('#datatable').DataTable({
                language: {
                    url: languages['{{ app()->getLocale() }}']
                },
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }, {
                    orderable: false,
                    searchable: false,
                    targets: -1
                }],
                select: {
                    style: 'multi+shift',
                    selector: 'td:first-child',
                    info: false,
                },
                dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: ['copy', 'excel', 'pdf', 'print'],
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route("admin.".getPluralModelName($modelName).".index") }}",
                columns: {!! json_encode($columns->toArray()) !!},
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 25,
            });
        });
    </script>
@endpush