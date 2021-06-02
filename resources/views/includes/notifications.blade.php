@if (session()->has('type'))
    <x-alerts.alert type="{{ session('type') }}" message="{{ session('message') }}" />
@endif
