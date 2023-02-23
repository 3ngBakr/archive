<div class="row g-3 mb-3">
    <div class="col-md-9">
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
    <div class="col-md-3">
        <div class="d-flex align-items-center">
            <label class="form-label {{ isset($row) ? '': 'required' }} me-2"
                   for="program_id">@lang('Parent Program')</label>
        </div>
        <select name="program_id"
                id="program_id"
                class="single-select {{ $errors->has('program_id') ? 'is-invalid' : '' }}"
                aria-describedby="program_id-invalid">
            @php
                $default = isset($row) ? $row->program_id : '';
            @endphp
            <option></option>
            @foreach($programs as $program)
                <option value="{{ $program->id }}"
                        {{ $program->id == old('program_id', $default) ? 'selected' : '' }}>
                    {{ $program->name }}
                </option>
            @endforeach
        </select>
        @if($errors->has('program_id'))
            <div id="program_id-invalid" class="invalid-feedback">
                {{ $errors->first('program_id') }}
            </div>
        @endif
    </div>
    <div class="col-md-9">
        <label class="form-label {{ isset($row) ? '': 'required' }}" for="cover">@lang('Cover')</label>
        <input class="form-control {{ $errors->has('cover') ? 'is-invalid' : '' }}"
               type="file"
               id="cover"
               name="cover"
               accept=".{{ implode(",.", config('ryada.file_mimes.models_cover')) }}"
               {{ isset($row) ? '': 'required' }} aria-describedby="cover-invalid">
        @if($errors->has('cover'))
            <div id="cover-invalid" class="invalid-feedback">
                {{ $errors->first('cover') }}
            </div>
        @endif
    </div>
    <div class="col-md-3">
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
    <div class="col-md-12">
        <label class="form-label required" for="content">@lang('Content')</label>
        <textarea name="content"
                  id="editor-content"
                  class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"
                  aria-describedby="content-invalid">{!! isset($row) ? old('content', $row->content) : old('content', '') !!}</textarea>
        @if($errors->has('content'))
            <div id="content-invalid" class="invalid-feedback">
                {{ $errors->first('content') }}
            </div>
        @endif
    </div>
</div>