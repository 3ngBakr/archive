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
    <div class="row g-3 mb-3">
        <div class="col-md-9">
            <label class="form-label required" for="description">@lang('Description')</label>
            <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                   type="text"
                   id="description"
                   name="description"
                   value="{{ isset($row) ? old('description', $row->name) : old('description', '') }}"
                   required aria-describedby="description-invalid">
            @if($errors->has('description'))
                <div id="description-invalid" class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
            @endif
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-9">
                <label class="form-label required" for="vision">@lang('Vision')</label>
                <input class="form-control {{ $errors->has('vision') ? 'is-invalid' : '' }}"
                       type="text"
                       id="vision"
                       name="vision"
                       value="{{ isset($row) ? old('vision', $row->name) : old('vision', '') }}"
                       required aria-describedby="vision-invalid">
                @if($errors->has('vision'))
                    <div id="vision-invalid" class="invalid-feedback">
                        {{ $errors->first('vision') }}
                    </div>
                @endif
            </div>
            <div class="row g-3 mb-3">
                <div class="col-md-9">
                    <label class="form-label required" for="message">@lang('Message')</label>
                    <input class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}"
                           type="text"
                           id="message"
                           name="message"
                           value="{{ isset($row) ? old('message', $row->name) : old('message', '') }}"
                           required aria-describedby="message-invalid">
                    @if($errors->has('message'))
                        <div id="message-invalid" class="invalid-feedback">
                            {{ $errors->first('message') }}
                        </div>
                    @endif
                </div>
                <div class="row g-3 mb-3">
   
   
    <div class="col-md-12">
        <label class="form-label required" for="objective">@lang('Objective')</label>
        <textarea name="objective"
                  id="editor-objective"
                  class="form-control {{ $errors->has('objective') ? 'is-invalid' : '' }}"
                  aria-describedby="objective-invalid">{!! isset($row) ? old('objective', $row->Objective) : old('objective', '') !!}</textarea>
        @if($errors->has('objective'))
            <div id="objective-invalid" class="invalid-feedback">
                {{ $errors->first('objective') }}
            </div>
        @endif
    </div>
</div>