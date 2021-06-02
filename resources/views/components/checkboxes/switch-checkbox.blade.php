<div class="custom-switch custom-control custom-switch-{{ $color }} custom-control-inline {{ $size ? 'switch-'.$size : '' }}">
    <input
            type="checkbox"
            class="custom-control-input {!! $class !!}"
            name="{{ $name }}"
            id="{{ $id }}"
            {{ $attributes }}
    >
    <label
            class="custom-control-label"
            for="{{ $id }}"
    >
        @if ($labelLeft && $labelRight)
            <span class="switch-text-left">{{ __($labelLeft) }}</span>
            <span class="switch-text-right">{{ __($labelRight) }}</span>
        @endif
        @if ($iconLeft && $iconRight)
            <span class="switch-icon-left"><i data-feather="{{ $iconLeft }}"></i></span>
            <span class="switch-icon-right"><i data-feather="{{ $iconRight }}"></i></span>
        @endif
    </label>
    <span class="switch-label">{{ __($label) }}</span>
</div>