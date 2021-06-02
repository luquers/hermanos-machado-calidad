<div {{ $col ? 'class='.$col : '' }}>
    <button type="{{ $type }}" class="btn btn-outline-{{ $color }} mb-1 waves-effect waves-light {{ $class }}" {{ $attributes }}>
        {{ __($label) }}
    </button>
</div>