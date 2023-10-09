@props(['message'])

<div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="message-alart-style1">
    <div class="alert alart_style_three alert-dismissible fade show mb20" role="alert">
        @lang($message)
    </div>
</div>
