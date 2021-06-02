@foreach(config($config) as $column => $data)
    @switch($data['type'])
        @case('text')
            <x-inputs.text col="{{ $data['col'] }}" id="{{ $column }}" name="{{ $column }}" label="{{$data['label']}}" />
            @break
        @case('email')
            <x-inputs.email col="{{ $data['col'] }}" id="{{ $column }}" name="{{ $column }}" label="{{$data['label']}}" />
            @break
    @endswitch
@endforeach
