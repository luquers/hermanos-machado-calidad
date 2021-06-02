<div {!! $col ? 'class="'.$col.'"' : '' !!}>
    <div class="form-group {{ $errors->has($name) ? 'error' : '' }}">
        <div class="controls">
            <label>{{__($label)}}</label>
            <small class="text-muted">{{ __($help) }}</small>
            <input
                    {!! $id ? 'id="'.$id.'"' : '' !!}
                    type="number"
                    class="form-control {!! $class !!}"
                    name="{{ $name }}"
                    {!! $placeholder ? 'placeholder="'.__($placeholder).'"' : '' !!}
                    step="{{ $step }}"
                    min="{{ $min }}"
                    max="{{ $max }}"
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