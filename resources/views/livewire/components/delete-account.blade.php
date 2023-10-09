<div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
    <h4 class="title fz17 mb30">@lang('Delete Account')</h4>
    <p>@lang('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.')</p>
    <x-btn-click wire:click="delete" title="Delete account" position="start" icon="far fa-trash" />
</div>
