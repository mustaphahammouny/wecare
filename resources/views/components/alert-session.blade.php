@if (session('error'))
    <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="message-alart-style1">
        <div class="alert alart_style_three alert-dismissible fade show mb20" role="alert">
            {{ session('error') }}
        </div>
    </div>
@elseif(session('success'))
    <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="message-alart-style1">
        <div class="alert alart_style_four alert-dismissible fade show mb20" role="alert">
            {{ session('success') }}
        </div>
    </div>
@endif
