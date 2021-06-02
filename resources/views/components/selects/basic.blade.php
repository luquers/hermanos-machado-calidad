<div {!! $col ? 'class="'.$col.'"' : '' !!}>
    @if ($label)
        <label>{{ __($label) }}</label>
    @endif

    <fieldset class="form-group {{ $errors->has($name) ? 'error' : '' }}">
        <select class="form-control {!! $class !!}"
                {!! $id ? 'id="'.$id.'"' : '' !!} name="{{ $name }}" {{ $required }} {{ $disabled }} {{ $multiple }} {{ $attributes }}>

            @if ($isIncludedSelectOptionTitle($includeSelectOptionTitle))
                <option value>{{ __($includeSelectOptionTitle) }}</option>
            @endif


            @foreach($options as $option)
                <option {!! $isSelected($option->$optionValue ?? $option[$optionValue]) ? 'selected="selected"' : '' !!}
                        value="{{ $option->$optionValue ?? $option[$optionValue] }}">{{ $option->$display ?? $option[$display] }}
                </option>
            @endforeach


        </select>
    </fieldset>
    @if($errors->has($name))
        @include('includes.input-error', ['name' => $name])
    @endif
</div>