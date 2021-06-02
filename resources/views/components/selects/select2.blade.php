{{-- TODO implementar iconos --}}
<div {!! $col ? 'class="'.$col.'"' : '' !!}>

    @if ($label)
        <label>{{ __($label) }}</label>
    @endif

    <div class="form-group {{ $errors->has($name) ? 'error' : '' }}">
        <select class="form-control {!! $class !!}"
                {!! $id ? 'id="'.$id.'"' : '' !!} name="{{ $name }}" {{ $required }} {{ $disabled }} {{ $multiple }} {{ $attributes }}>

            @if ($isIncludedSelectOptionTitle($includeSelectOptionTitle))
                <option value>{{ __($includeSelectOptionTitle) }}</option>
            @endif

            @foreach($options as $option)
                <option
                        {!! $isSelected($option->$optionValue ?? $option[$optionValue]) ? 'selected="selected"' : '' !!}
                        {!! $dataIcon ? 'data-icon="fa fa-'.$dataIcon.'"' : '' !!}
                        value="{{ $option->$optionValue ?? $option[$optionValue] }}"
                >
                    {{ $option->$display ?? $option[$display] }}
                </option>
            @endforeach

        </select>
    </div>

    @if($errors->has($name))
        @include('includes.input-error', ['name' => $name])
    @endif

</div>