<div class="row mb-3">
    <div class="col-sm-3">
        <h6 class="mb-0">@lang($title)</h6>
    </div>
    <div class="col-sm-9 text-secondary">
        @if ($type === 'textarea')
            <textarea readonly cols="30" rows="10" class="form-control">{{ $value }}</textarea>
        @elseif($type === 'download')
            <a href="{{ route("admin.".getPluralModelName($modelName).".download", $value) }}"
               class="btn btn-outline-info">
                <i class="bx bx-download mr-1"></i>@lang('Download')
            </a>
        @else
            <input readonly type="text" class="form-control" value="{{ $value }}"/>
        @endif
    </div>
</div>