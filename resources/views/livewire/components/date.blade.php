<div>
    <h4 class="title fz17 my-4 text-center">@lang('Date of your session')</h4>
    <form wire:submit="submit">
        <div wire:ignore class="d-flex justify-content-center">
            <div id="datepicker" data-date="{{ $form->date ?? '' }}"></div>
        </div>

        <x-alert-error name="form.date" />

        <div class="d-flex justify-content-between mb20">
            <x-btn-click wire:click="$parent.previous('date')" title="Previous" icon="far fa-chevron-left" />
            <x-btn-submit title="Next" position="end" icon="far fa-chevron-right" />
        </div>
    </form>
</div>
