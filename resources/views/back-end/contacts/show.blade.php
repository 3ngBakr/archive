<div class="row pt-4">
    <x-show-info title="Name" :value="$row->name"></x-show-info>
    <x-show-info title="Email" :value="$row->email"></x-show-info>
    <x-show-info title="Phone" :value="$row->phone"></x-show-info>
    <x-show-info title="Subject" :value="$row->subject"></x-show-info>
    <x-show-info title="Message" :value="$row->message" type="textarea"></x-show-info>
    @if ($row->hasFileOrFiles())
        <x-show-info title="File" :value="$row->id" type="download" :modelName="$modelName"></x-show-info>
    @endif
</div>
<hr>
<div class="row pt-2">
    <div class="col-sm-4">
        @include("back-end.inc.reply-button")
    </div>
</div>