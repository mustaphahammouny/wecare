<div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
    <h4 class="title fz17 mb30">@lang('Edit booking status')</h4>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form wire:submit="save" class="form-style1">
                <div class="mb15">
                    <div class="form-group">
                        <select wire:model="form.status" class="form-control @error('form.status') border-danger is-invalid @enderror">
                            @foreach ($statuses as $status)
                                <option value="{{ $status->value }}" @selected($form->status == $status->value)>
                                    @lang($status->title())
                                </option>
                            @endforeach
                        </select>

                        @error('form.status')
                            <div class="invalid-feedback">@lang($message)</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end my20">
                    <x-btn-submit title="Save" position="start" icon="far fa-save" />
                </div>
            </form>
        </div>
    </div>
</div>
