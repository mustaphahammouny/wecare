<input type="radio" class="btn-check" {{ $attributes }} autocomplete="off">
<label class="ud-btn btn-thm-border w-100 me-4" for="{{ $attributes['id'] }}">
    {{ $slot }}
</label>
