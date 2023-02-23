  <div class="row">
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
           
            
                </div>
              