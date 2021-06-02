
        <x-inputs.text col="col-12 col-lg-3" id="name" name="name" label="global.user" />

        <x-selects.basic id="audit_events" col="col-12 col-lg-3" :options="$eventselect" optionValue="id" display="name" name="audit_events" label="global.event"/>

        <x-selects.basic id="audit_models" col="col-12 col-lg-3" :options="$modelselect" optionValue="id" display="name" name="audit_models" label="global.model"/>

        <x-buttons.button col="col-12 col-lg-3" label="global.delete_filters" type="button" color="primary" id="delete_filters" name="delete_filters" />
