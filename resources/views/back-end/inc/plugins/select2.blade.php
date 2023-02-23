@push('plugins_css')
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet"/>
    @if (app()->getLocale() == 'ar')
        <link href="{{ asset('assets/plugins/select2/css/select2-bootstrap4-rtl.min.css') }}" rel="stylesheet"/>
    @else
        <link href="{{ asset('assets/plugins/select2/css/select2-bootstrap4.min.css') }}" rel="stylesheet"/>
    @endif
@endpush

@push('plugins_js')
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
@endpush()

@push('scripts')
    <script>
        $('.select-all').click(function () {
            let $select2 = $(this).parent().parent().siblings('.multiple-select, .single-select')
            $select2.find('option').prop('selected', 'selected')
            $select2.trigger('change')
        })

        $('.deselect-all').click(function () {
            let $select2 = $(this).parent().parent().siblings('.multiple-select, .single-select')
            $select2.find('option').prop('selected', '')
            $select2.trigger('change')
        })

        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: '@lang('Places Select')',
            allowClear: true,
        });

        $('.multiple-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: '@lang('Places Select')',
            allowClear: true,
        });
    </script>
@endpush