<fieldset>
    <div class="vs-checkbox-con vs-checkbox-{{ $color ?: 'primary' }}">
        <input type="checkbox"
               name="{{ $name }}"
               {!! $class ? 'class="'.$class : '"' !!}
               {!! $id ? 'id="'.$id.'"' : '' !!}
               {{ $checked ?: '' }}
               value="{{ $value }}"
                {{ $attributes }}
        >
        <span class="vs-checkbox">
            <span class="vs-checkbox--check">
                <i class="vs-icon feather icon-{{ $icon ?: 'check' }}"></i>
            </span>
        </span>
        <span class="">{{ __($label) }}</span>
    </div>
</fieldset>