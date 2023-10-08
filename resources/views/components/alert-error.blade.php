@props(['name', 'classes' => ''])

@error($name)
    <div class="message-alart-style1">
        <div class="alert alart_style_three alert-dismissible fade show {{ $classes }}" role="alert">
            @lang($message)
        </div>
    </div>
@enderror
