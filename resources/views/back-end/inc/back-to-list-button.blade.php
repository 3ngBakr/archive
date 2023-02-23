@can("index {$modelName}")
    <a class="btn btn-outline-dark px-5 radius-30"
       href="{{ route("admin.".getPluralModelName($modelName).".index") }}">
        <i class="bx bx-exit mr-1"></i>@lang('Back to list')
    </a>
@endcan