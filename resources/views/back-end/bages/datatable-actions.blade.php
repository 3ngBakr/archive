@if ($actions['show'])
    @can("show {$modelName}")
        <a class="btn btn-outline-primary"
           href="{{ route("admin.".getPluralModelName($modelName).".show", $row->id) }}"
           title="@lang('Show')">
            <i class="bx bx-show me-0"></i>
        </a>
    @endcan
@endif
@if ($actions['reply'])
    @can("edit {$modelName}")
        <a class="btn btn-outline-secondary"
           href="mailto:{{ $row->email }}"
           title="@lang('Reply')">
            <i class="bx bx-reply me-0"></i>
        </a>
    @endcan
@endif

@if ($actions['edit'])
    @can("edit {$modelName}")
        <a class="btn btn-outline-info" href="{{ route("admin.".getPluralModelName($modelName).".edit", $row->id) }}"
           title="@lang('Edit')">
            <i class="bx bx-edit me-0"></i>
        </a>
    @endcan
@endif

@if ($actions['download'] && $row->hasFileOrFiles())
    <a class="btn btn-outline-info"
       href="{{ route("admin.".getPluralModelName($modelName).".download", $row->id) }}"
       title="@lang('Download')">
        <i class="bx bx-download me-0"></i>
    </a>
@endif
