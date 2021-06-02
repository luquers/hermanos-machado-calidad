<div {!! $col ? 'class="'.$col.'"' : '' !!}>
    <div class="form-group {{ $errors->has($name) ? 'error' : '' }}">

        @if ($label)
            <label>{{ __($label) }}</label>
        @endif

        <input
                {!! $id ? 'id="'.$id.'"' : '' !!}
                type="text"
                class="form-control {!! $class !!}"
                name="{{ $name }}"
                {{ $disabled }}
                {{ $required }}
                value="{{ $value }}"
                {{ $attributes }}
        />

        @if ($id)
            <div id="root-picker-outlet-{{ $id }}" style="position:relative"></div>
        @endif

        @if($errors->has($name))
            @include('includes.input-error', ['name' => $name])
        @endif
    </div>
</div>
