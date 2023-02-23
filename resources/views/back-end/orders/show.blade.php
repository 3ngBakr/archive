<div class="row pt-4">
    <x-show-info title="Name" :value="$row->name"></x-show-info>
    <x-show-info title="Position" :value="$row->position"></x-show-info>
    <x-show-info title="Personal Phone" :value="$row->personal_phone"></x-show-info>
    <x-show-info title="Company Name" :value="$row->company"></x-show-info>
    <x-show-info title="Company Phone" :value="$row->company_phone"></x-show-info>
    <x-show-info title="Email" :value="$row->email"></x-show-info>
    <x-show-info title="Services" :value="$row->getServicesName()   "></x-show-info>
    <x-show-info title="Message" :value="$row->message" type="textarea"></x-show-info>
</div>
<hr>
<div class="row pt-2">
    <div class="col-sm-4">
        @include("back-end.inc.reply-button")
    </div>
</div>