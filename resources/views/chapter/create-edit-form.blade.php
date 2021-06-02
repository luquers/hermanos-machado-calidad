<form id="create-chapter" method="post" action="{{ $action }}" novalidate>
    @csrf
    {{ isset($chapter) ? method_field('put') : '' }}
    <div class="row">
        <x-inputs.text col="col-12 col-lg-6" name="code" label="global.code" id="code" value="{{old('code', $chapter->code ?? '')}}" />

        <x-inputs.text col="col-12 col-lg-6" name="name" label="global.name" id="name" value="{{old('name', $chapter->name ?? '')}}" />


    </div>
    <div class="row">
        <x-buttons.button col="col-12" label="global.save" type="submit" color="primary" class="float-right"/>
    </div>
</form>