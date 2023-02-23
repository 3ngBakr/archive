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
                   for="service_id">@lang('Parent Service')</label>
        </div>
        <select name="service_id"
                id="service_id"
                class="single-select {{ $errors->has('service_id') ? 'is-invalid' : '' }}"
                aria-describedby="service_id-invalid">
            @php
                $default = isset($row) ? $row->service_id : '';
            @endphp
            <option></option>
            @foreach($services as $service)
                <option value="{{ $service->id }}"
                        {{ $service->id == old('service_id', $default) ? 'selected' : '' }}>
                    {{ $service->name }}
                </option>
            @endforeach
        </select>
        @if($errors->has('service_id'))
            <div id="service_id-invalid" class="invalid-feedback">
                {{ $errors->first('service_id') }}
            </div>
        @endif
    </div>
    <div class="col-md-9">
        <label class="form-label" for="description">@lang('Description')</label>
        <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
               type="text"
               id="description"
               name="description"
               value="{{ isset($row) ? old('description', $row->description) : old('description', '') }}"
               aria-describedby="description-invalid">
        @if($errors->has('description'))
            <div id="description-invalid" class="invalid-feedback">
                {{ $errors->first('description') }}
            </div>
        @endif
    </div>
    <div class="col-md-3">
        <div class="d-flex align-items-center">
            <label class="form-label me-2" for="order_all_child">@lang('Order All Child')</label>
        </div>
        <select name="order_all_child"
                id="order_all_child"
                class="single-select {{ $errors->has('order_all_child') ? 'is-invalid' : '' }}"
                aria-describedby="order_all_child-invalid">
            @php
                $default = isset($row) ? $row->order_all_child : false;
            @endphp
            <option value="0" {{ old('order_all_child', $default) ? 'selected' : '' }}>@lang('No')</option>
            <option value="1" {{ old('order_all_child', $default) ? 'selected' : '' }}>@lang('Yes')</option>
        </select>
        @if($errors->has('order_all_child'))
            <div id="order_all_child-invalid" class="invalid-feedback">
                {{ $errors->first('order_all_child') }}
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
</div>
