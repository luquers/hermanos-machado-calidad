@if ($col)
<div class="{{ $col }}">
@endif

    <button type="{{ $type }}" class="btn btn-{{ $color }} mb-1 waves-effect waves-light {{ $class }}" {{ $attributes }}>
        {{ __($label) }}
    </button>

@if ($col)
</div>
@endif