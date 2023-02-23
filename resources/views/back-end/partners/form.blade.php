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
    <label class="form-label {{ isset($row) ? '': 'required' }}" for="logo">@lang('Logo')</label>
    <input class="form-control {{ $errors->has('logo') ? 'is-invalid' : '' }}"
           type="file"
           id="logo"
           name="logo"
           accept=".{{ implode(",.", config('ryada.file_mimes.models_logo')) }}"
           {{ isset($row) ? '': 'required' }} aria-describedby="logo-invalid">
    @if($errors->has('logo'))
        <div id="logo-invalid" class="invalid-feedback">
            {{ $errors->first('logo') }}
        </div>
    @endif
</div>
