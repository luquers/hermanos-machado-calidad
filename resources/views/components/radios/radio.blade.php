<fieldset>
    <div class="vs-radio-con vs-radio-{{ $color ?: 'primary' }}">
        <input
                type="radio"
                name="{{ $name }}"
                value="{{ $value }}"
                {{ $attributes }}
        >
        <span class="vs-radio">
            <span class="vs-radio--border"></span>
            <span class="vs-radio--circle"></span>
        </span>
        <span class="">{{ __($label) }}</span>
    </div>
</fieldset>