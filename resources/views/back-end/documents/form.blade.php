<div class="mb-3">
    <label class="form-label required" for="dateOfBublish">@lang('تاريخ النشر')</label>
    <input class="form-control {{ $errors->has('dateOfBublish') ? 'is-invalid' : '' }}"
           type="text"
           id="dateOfBublish"
          placeholder="تاريخ النشر"
           name="dateOfBublish"
           value="{{ isset($row) ? old('dateOfBublish', $row->name) : old('dateOfBublish', '') }}"
           required aria-describedby="dateOfBublish-invalid">
    @if($errors->has('dateOfBublish'))
        <div id="dateOfBublish-invalid" class="invalid-feedback">
            {{ $errors->first('dateOfBublish') }}
        </div>
    @endif
</div>


<div class="mb-3">
    <label class="form-label required" for="name">@lang('العنوان')</label>
    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
           type="text"
           id="name"
           placeholder="العنوان"
           name="name"
           value="{{ isset($row) ? old('name', $row->name) : old('name', '') }}"
           required aria-describedby="name-invalid">
    @if($errors->has('name'))
        <div id="name-invalid" class="invalid-feedback">
            {{ $errors->first('name') }}
        </div>
    @endif
</div>

<div class="mb-3">
    <label class="form-label required" for="name">@lang('المرسل')</label>
    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
           type="text"
           id="name"
          placeholder="المرسل"
           name="sender"
           value="{{ isset($row) ? old('name', $row->name) : old('name', '') }}"
           required aria-describedby="name-invalid">
    @if($errors->has('name'))
        <div id="name-invalid" class="invalid-feedback">
            {{ $errors->first('name') }}
        </div>
    @endif
</div>


<div class="mb-3">
    <label class="form-label required" for="name">@lang('المرسل اليه')</label>
    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
           type="text"
           id="name"
          placeholder="المرسل اليه"
           name="reciver"
           value="{{ isset($row) ? old('name', $row->name) : old('name', '') }}"
           required aria-describedby="name-invalid">
    @if($errors->has('name'))
        <div id="name-invalid" class="invalid-feedback">
            {{ $errors->first('name') }}
        </div>
    @endif
</div>


<div class="mb-3">
    <label class="form-label" for="description">@lang('ملاحظة')</label>
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
<div class="mb-3">
    <div class="d-flex align-items-center">
        <label class="form-label {{ isset($row) ? '': 'required' }} me-2"
               for="documentTypes">@lang('Document Types')</label>
        <div class="pb-1">
            <span class="btn btn-outline-info px-5 radius-30 select-all">@lang('Select all')</span>
            <span class="btn btn-outline-info px-5 radius-30 deselect-all">@lang('Deselect all')</span>
        </div>
    </div>
    <select name="documentTypes[]"
            id="documentTypes"
            class="multiple-select {{ $errors->has('documentTypes') ? 'is-invalid' : '' }}"
            multiple {{ isset($row) ? '': 'required' }} aria-describedby="documentTypes-invalid">
        @php
            $default_array = [];

            if (isset($row)) {
                $default_array = $row->documentTypes->pluck('id')->toArray();
            }
        @endphp
        <option></option>
        @foreach($documentTypes as $id => $documentType)
            <option value="{{ $id }}" {{ in_array($id, old('documentTypes', $default_array)) ? 'selected' : '' }}>
                {{ $documentType }}
            </option>
        @endforeach
    </select>
    @if($errors->has('documentTypes'))
        <div id="documentTypes-invalid" class="invalid-feedback">
            {{ $errors->first('documentTypes') }}
        </div>
    @endif
</div>
<div class="mb-3">
    <label class="form-label {{ isset($row) ? '': 'required' }}" for="file">@lang('File')</label>
    <input class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}"
           type="file"
           id="file"
           name="file"
           accept=".{{ implode(",.", config('ryada.file_mimes.downloads')) }}"
           {{ isset($row) ? '': 'required' }} aria-describedby="file-invalid">
    @if($errors->has('file'))
        <div id="file-invalid" class="invalid-feedback">
            {{ $errors->first('file') }}
        </div>
    @endif
</div>