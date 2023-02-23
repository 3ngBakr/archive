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
    <label class="form-label required" for="email">@lang('Email')</label>
    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
           name="email"
           id="email" value="{{ isset($row) ? old('email', $row->email): old('email', '') }}" required
           aria-describedby="email-invalid">
    @if($errors->has('email'))
        <div id="email-invalid" class="invalid-feedback">
            {{ $errors->first('email') }}
        </div>
    @endif
</div>
<div class="mb-3">
    <label class="form-label {{ isset($row) ? '':'required' }}" for="password">@lang('Password')</label>
    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
           name="password" id="password" {{ isset($row) ? '':'required' }} aria-describedby="password-invalid">
    @if($errors->has('password'))
        <div id="password-invalid" class="invalid-feedback">
            {{ $errors->first('password') }}
        </div>
    @endif
</div>
<div class="mb-3">
    <div class="d-flex align-items-center">
        <label class="form-label required me-2" for="roles">@lang('Roles')</label>
        <div class="pb-1">
            <span class="btn btn-outline-info px-5 radius-30 select-all">@lang('Select all')</span>
            <span class="btn btn-outline-info px-5 radius-30 deselect-all">@lang('Deselect all')</span>
        </div>
    </div>
    <select name="roles[]"
            id="roles"
            data-placeholder="Test"
            class="multiple-select {{ $errors->has('roles') ? 'is-invalid' : '' }}"
            multiple required aria-describedby="roles-invalid">
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