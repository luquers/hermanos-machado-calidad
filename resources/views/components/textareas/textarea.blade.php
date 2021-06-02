<div {!! $col ? 'class="'.$col.'"' : '' !!}>
    @if ($label)
        <label>{{ __($label)}}</label>
    @endif
    <fieldset class="form-group {{$errors->has($name) ? 'error' : '' }}">
        <textarea
                class="form-control {!! $class !!}"
                {!! $id ? 'id="'.$id.'"' : '' !!}
                rows="{{ $rows }}"
                name="{{ $name }}"
                {!! $placeholder ? 'placeholder="'.__($placeholder).'"' : '' !!}
                {{ $required }}
                {{ $disabled }}
                {{ $readOnly }}
                {!! $counter ? 'data-length="'.$counter.'"' : '' !!}
                {{ $attributes }}
        >{{ $value }}</textarea>
        @if ($counter)
            <small class="counter-value float-right"><span class="char-count">0</span>/{{ $counter }}</small>
        @endif
        @if($errors->has($name))
        @include('includes.input-error', ['name' => $name])
        @endif
    </fieldset>
</div>