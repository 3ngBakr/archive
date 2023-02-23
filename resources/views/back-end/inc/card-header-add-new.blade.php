<div class="card-header d-flex justify-content-between align-items-center bg-white">
    <h6 class="mb-0">@lang(getUpperPluralModelName($modelName)." List")</h6>

    @if ($actions['create'])
        @can("create {$modelName}")
            <a class="btn btn-outline-primary px-5 radius-30"
               href="{{ route("admin.".getPluralModelName($modelName).".create") }}">
                <i class="bx bx-plus mr-1"></i>@lang("Add ".getUpperModelName($modelName))
            </a>
        @endcan
    @endif
</div>