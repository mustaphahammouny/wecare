@props([
    'title',
    'end' => null
])

<div class="pd-list d-flex justify-content-between">
    <p class="text mb-0">@lang($title)</p>
    @if ($end)
        <p>{{ $end }}</p>
    @endif
</div>