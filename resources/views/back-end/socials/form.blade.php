<div class="row g-3 mb-3">
    <div class="col-md-9">
        <label class="form-label required" for="facebook">@lang('Facebook')</label>
        <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}"
               type="text"
               id="facebook"
               name="facebook"
               value="{{ isset($row) ? old('facebook', $row->facebook) : old('facebook', '') }}"
               required aria-describedby="facebook-invalid">
        @if($errors->has('facebook'))
            <div id="facebook-invalid" class="invalid-feedback">
                {{ $errors->first('facebook') }}
            </div>
        @endif
    </div>

    <div class="col-md-9">
        <label class="form-label required" for="twitter">@lang('Twitter')</label>
        <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}"
               type="text"
               id="twitter"
               name="twitter"
               value="{{ isset($row) ? old('twitter', $row->twitter) : old('twitter', '') }}"
               required aria-describedby="twitter-invalid">
        @if($errors->has('twitter'))
            <div id="twitter-invalid" class="invalid-feedback">
                {{ $errors->first('twitter') }}
            </div>
        @endif
    </div>

    <div class="col-md-9">
        <label class="form-label required" for="whatsapp">@lang('Whatsapp')</label>
        <input class="form-control {{ $errors->has('whatsapp') ? 'is-invalid' : '' }}"
               type="text"
               id="whatsapp"
               name="whatsapp"
               value="{{ isset($row) ? old('whatsapp', $row->whatsapp) : old('whatsapp', '') }}"
               required aria-describedby="whatsapp-invalid">
        @if($errors->has('whatsapp'))
            <div id="whatsapp-invalid" class="invalid-feedback">
                {{ $errors->first('whatsapp') }}
            </div>
        @endif
    </div>

    <div class="col-md-9">
        <label class="form-label required" for="instagram">@lang('Instagram')</label>
        <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}"
               type="text"
               id="instagram"
               name="instagram"
               value="{{ isset($row) ? old('instagram', $row->instagram) : old('instagram', '') }}"
               required aria-describedby="instagram-invalid">
        @if($errors->has('instagram'))
            <div id="instagram-invalid" class="invalid-feedback">
                {{ $errors->first('instagram') }}
            </div>
        @endif
    </div>

    <div class="col-md-9">
        <label class="form-label required" for="telegram">@lang('Telegram')</label>
        <input class="form-control {{ $errors->has('telegram') ? 'is-invalid' : '' }}"
               type="text"
               id="telegram"
               name="telegram"
               value="{{ isset($row) ? old('telegram', $row->telegram) : old('telegram', '') }}"
               required aria-describedby="telegram-invalid">
        @if($errors->has('telegram'))
            <div id="telegram-invalid" class="invalid-feedback">
                {{ $errors->first('telegram') }}
            </div>
        @endif
    </div>

   
  
</div>