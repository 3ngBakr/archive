<div class="row pt-4">
    <x-show-info title="Name" :value="$row->name"></x-show-info>
    <x-show-info title="Description" :value="$row->description" type="textarea"></x-show-info>
    <x-show-info title="Order All Child" :value="$row->order_all_child ? __('Yes') : __('No')"></x-show-info>
    @if (isset($row->parentService) && $row->parentService->exists())
        <x-show-info title="Parent Service" :value="$row->parentService->name"></x-show-info>
    @endif
    @if (isset($row->services) && count($row->services))
        <x-show-info title="Services" :value="$row->getServicesName()"></x-show-info>
    @endif
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