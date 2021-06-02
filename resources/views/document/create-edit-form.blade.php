<form id="create-document" method="post" action="{{ $action }}" novalidate>
    @csrf
    {{ isset($document) ? method_field('put') : '' }}
    <div class="row">
        <x-inputs.text col="col-12 col-lg-6" name="code" label="global.code" id="code" value="{{old('code', $document->code ?? '')}}" />

<x-inputs.text col="col-12 col-lg-6" name="name" label="global.name" id="name" value="{{old('name', $document->name ?? '')}}" />

<x-textareas.textarea col="col-12 col-lg-6" rows="6" label="global.link" name="link" value="{{old('link', $document->link ?? '')}}" />


    </div>
    <div class="row">
        <x-buttons.button col="col-12" label="global.save" type="submit" color="primary" class="float-right"/>
    </div>
</form>