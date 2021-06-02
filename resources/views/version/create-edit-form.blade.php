<form id="create-version" method="post" action="{{ $action }}" novalidate>
    @csrf
    {{ isset($version) ? method_field('put') : '' }}
    <div class="row">
        <x-textareas.textarea col="col-12 col-lg-6" rows="6" label="global.description" name="description" value="{{old('description', $version->description ?? '')}}" />


    </div>
    <div class="row">
        <x-buttons.button col="col-12" label="global.save" type="submit" color="primary" class="float-right"/>
    </div>
</form>