<div class="row g-3 mb-3">
    <div class="col-md-9">
        <label class="form-label required" for="title">@lang('Title')</label>
        <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
               type="text"
               id="title"
               name="title"
               value="{{ isset($row) ? old('title', $row->title) : old('title', '') }}"
               required aria-describedby="name-invalid">
        @if($errors->has('title'))
            <div id="name-invalid" class="invalid-feedback">
                {{ $errors->first('title') }}
            </div>
        @endif
    </div>
    <div class="col-md-3">
        <div class="d-flex align-items-center">
            <label class="form-label required me-2"
                   for="type">@lang('Types')</label>
        </div>
        <select name="type"
                id="type"
                class="single-select {{ $errors->has('type') ? 'is-invalid' : '' }}"
                required aria-describedby="type-invalid">
            @php
                $default = isset($row) ? $row->type : '';
            @endphp
            <option value=""></option>
            @foreach($types as $id => $type)
                <option value="{{ $id }}" {{ $id == old('type', $default) ? 'selected' : '' }}>
                    {{ $type }}
                </option>
            @endforeach
        </select>
        @if($errors->has('type'))
            <div id="type-invalid" class="invalid-feedback">
                {{ $errors->first('type') }}
            </div>
        @endif
    </div>
    <div class="col-md-9">
        <label class="form-label {{ isset($row) ? '': 'required' }}" for="image">@lang('Image')</label>
        <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
               type="file"
               id="image"
               name="image"
               accept="image/*"
               {{ isset($row) ? '': 'required' }} aria-describedby="image-invalid">
        @if($errors->has('image'))
            <div id="image-invalid" class="invalid-feedback">
                {{ $errors->first('image') }}
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
