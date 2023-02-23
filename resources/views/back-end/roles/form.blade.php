<div class="mb-3">
    <label class="form-label required" for="name">@lang('Name')</label>
    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
           id="name" value="{{ isset($row) ? old('name', $row->name) : old('name', '') }}" required
           aria-describedby="name-invalid">
    @if($errors->has('name'))
        <div id="name-invalid" class="invalid-feedback">
            {{ $errors->first('name') }}
        </div>
    @endif
</div>
<div class="mb-3">
    <div class="d-flex align-items-center">
        <label class="form-label me-2" for="permissions">@lang('Permissions')</label>
        <div class="pb-1">
            <span class="btn btn-outline-info px-5 radius-30 select-all">@lang('Select all')</span>
            <span class="btn btn-outline-info px-5 radius-30 deselect-all">@lang('Deselect all')</span>
        </div>
    </div>
    <select name="permissions[]"
            id="permissions"
            data-placeholder="@lang('Select all')"
            data-allow-clear="1"
            class="multiple-select {{ $errors->has('permissions') ? 'is-invalid' : '' }}"
            multiple aria-describedby="permissions-invalid">
        @php
            $default_array = [];

            if (isset($row)) {
                $default_array = $row->permissions->pluck('id')->toArray();
            }
        @endphp
        @foreach($permissions as $id => $permission)
            <option value="{{ $id }}" {{ in_array($id, old('permissions', $default_array)) ? 'selected' : '' }}>
                {{ $permission }}
            </option>
        @endforeach
    </select>
    @if($errors->has('permissions'))
        <div id="permissions-invalid" class="invalid-feedback">
            {{ $errors->first('permissions') }}
        </div>
    @endif
</div>