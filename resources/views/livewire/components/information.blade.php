<div>
    <h4 class="title fz17 my-4 text-center">@lang('Information to contact you')</h4>
    <form wire:submit="submit">
        <div class="mb15">
            <x-input-group wire:model="form.phone" placeholder="Phone" :alert="true">
                <span class="fi fi-ma"></span>
            </x-input-group>
        </div>

        <div class="mb15">
            <div wire:ignore class="form-group">
                <select id="select-city" data-placeholder="{{ __('City') }}"
                    class="form-select">
                    <option></option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" @selected($form->city == $city->id)>
                            @lang($city->name)
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-2">
                <x-alert-error name="form.city" />
            </div>
        </div>


        <x-textarea wire:model="form.address" rows="4" placeholder="Address" :alert="true" />

        <div class="d-flex justify-content-end my20">
            <x-btn-submit title="Next" position="end" icon="far fa-chevron-right" />
        </div>
    </form>
</div>
