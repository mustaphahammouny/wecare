@if (session('error'))
    <x-alert-danger :message="session('error')" />
@elseif(session('success'))
    <x-alert-success :message="session('success')" />
@endif
