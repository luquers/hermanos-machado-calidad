<div {!! $col ? 'class="'.$col.'"' : '' !!}>
    <div class="form-group {{ $errors->has($name) ? 'error' : '' }}">
        <div class="controls">
            @if ($label)
                <label>{{ __($label) }}</label>
            @endif

            @if ($help)
                <small class="text-muted">{{ __($help) }}</small>
            @endif

            <input
                    {!! $id ? 'id="'.$id.'"' : '' !!}
                    type="password"
                    class="form-control {!! $class !!}"
                    name="{{ $name }}"
                    {!! $placeholder ? 'placeholder="'.__($placeholder).'"' : '' !!}
                    {{ $readOnly }}
                    {{ $disabled }}
                    {{ $required }}
                    value="{{ $value }}"
                    {{ $attributes }}
            />
        </div>

        @if($errors->has($name))
            @include('includes.input-error', ['name' => $name])
        @endif

    </div>
</div>