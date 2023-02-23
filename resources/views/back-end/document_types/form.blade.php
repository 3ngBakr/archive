<div class="mb-3">
    <label class="form-label required" for="name">@lang('Name')</label>
    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
           type="text"
           id="name"
           name="name"
           value="{{ isset($row) ? old('name', $row->name) : old('name', '') }}"
           required aria-describedby="name-invalid">
    @if($errors->has('name'))
        <div id="name-invalid" class="invalid-feedback">
            {{ $errors->first('name') }}
        </div>
    @endif
</div>