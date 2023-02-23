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

@if ($actions['delete'])
    @can("delete {$modelName}")
        <form action="{{ route("admin.".getPluralModelName($modelName).".destroy", $row->id) }}"
              onsubmit="return confirm('@lang('Are you sure?')');" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger" title="@lang('Delete')">
                <i class="bx bx-trash me-0"></i>
            </button>
        </form>
    @endcan
@endif

@if ($actions['download'] && $row->hasFileOrFiles())
    <a class="btn btn-outline-info"
       href="{{ route("admin.".getPluralModelName($modelName).".download", $row->id) }}"
       title="@lang('Download')">
        <i class="bx bx-download me-0"></i>
    </a>
@endif
