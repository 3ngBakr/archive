<div class="row pt-4">
    <x-show-info title="Name" :value="$row->name"></x-show-info>
    <x-show-info title="Description" :value="$row->description" type="textarea"></x-show-info>
    
   
    <div class="row mb-3">
        <div class="col-sm-3">
            <h6 class="mb-0">@lang('Content')</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            {!! html_entity_decode($row->content) !!}
        </div>
    </div>
</div>
{{--<hr>--}}
{{--<div class="row pt-2">--}}
{{--    <div class="col-sm-4">--}}
{{--        @include("back-end.inc.reply-button")--}}
{{--    </div>--}}
{{--</div>--}}