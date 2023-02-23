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
        <label class="form-label me-2" for="roles">@lang('Roles')</label>
        <div class="pb-1">
            <span class="btn btn-outline-info px-5 radius-30 select-all">@lang('Select all')</span>
            <span class="btn btn-outline-info px-5 radius-30 deselect-all">@lang('Deselect all')</span>
        </div>
    </div>
    <select name="roles[]"
            id="roles"
            data-placeholder="Test"
            class="multiple-select {{ $errors->has('roles') ? 'is-invalid' : '' }}"
            multiple aria-describedby="roles-invalid">
        @php
            $default_array = [];

            if (isset($row)) {
                $default_array = $row->roles->pluck('id')->toArray();
            }
        @endphp
        @foreach($roles as $id => $role)
            <option value="{{ $id }}" {{ in_array($id, old('roles', $default_array)) ? 'selected' : '' }}>
                {{ $role }}
            </option>
        @endforeach
    </select>
    @if($errors->has('roles'))
        <div id="roles-invalid" class="invalid-feedback">
            {{ $errors->first('roles') }}
        </div>
    @endif
</div>