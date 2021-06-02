<div {{ $col ? 'class='.$col : '' }}>
    <button type="{{ $type }}" class="btn btn-{{ $color }} mb-1 waves-effect waves-light {{ $class }}">
        <i data-feather="{{ $icon }}" class="mr-25"></i>
        {{ __($label) }}
    </button>
</div>