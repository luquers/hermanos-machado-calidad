@extends('layouts.contentLayoutMaster')

@section('title', __('template-components.components'))

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">

    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection

@section('content')
    @include('includes.notifications')
    <section class="users-edit">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title">Componente Input Email</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <pre class="language-html">
                                <code>
                                    &lt;x-inputs.email col="col-12 col-lg-6" label="global.email" name="email" /&gt;
                                </code>
                            </pre>
                            <x-inputs.email label="global.email" name="email" />
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5>Props</h5>
                            <code>name (Requerido) - Name del input</code>
                            <br/>
                            <code>col (No requerido) - Utiliza las clases que corresponden al grid de Bootstrap</code>
                            <br/>
                            <code>label (No Requerido) - Sin la directiva lang de Laravel</code>
                            <br/>
                            <code>placeholder (No Requerido) - Sin la directiva lang de Laravel</code>
                            <br/>
                            <code>id (No requerido) - Id del input</code>
                            <br/>
                            <code>class (No requerido) - Clases que se agregarán al atributo class del elemento</code>
                            <br/>
                            <code>disabled (No requerido) - Deshabilita el input</code>
                            <br/>
                            <code>readOnly (No requerido) - Establece el input como solo lectura</code>
                            <br/>
                            <code>required (No requerido) - Establece el input como requerido</code>
                            <br/>
                            <code>help (No requerido) - Añade un subtítulo en gris junto al label. Introducir sin la directiva lang</code>
                            <br/>
                            <code>value (No requerido) - Añade un valor por defecto al input</code>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title">Componente Input Text</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <pre class="language-html">
                                <code>
                                    &lt;x-inputs.text col="col-12 col-lg-6" label="global.name" name="name" /&gt;
                                </code>
                            </pre>
                            <x-inputs.text label="global.name" name="name" />
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5>Props</h5>
                            <code>name (Requerido) - Name del input</code>
                            <br/>
                            <code>col (No requerido) - Utiliza las clases que corresponden al grid de Bootstrap</code>
                            <br/>
                            <code>label (No Requerido) - Sin la directiva lang de Laravel</code>
                            <br/>
                            <code>placeholder (No Requerido) - Sin la directiva lang de Laravel</code>
                            <br/>
                            <code>id (No requerido) - Id del input</code>
                            <br/>
                            <code>class (No requerido) - Clases que se agregarán al atributo class del elemento</code>
                            <br/>
                            <code>disabled (No requerido) - Deshabilita el input</code>
                            <br/>
                            <code>readOnly (No requerido) - Establece el input como solo lectura</code>
                            <br/>
                            <code>required (No requerido) - Establece el input como requerido</code>
                            <br/>
                            <code>help (No requerido) - Añade un subtítulo en gris junto al label. Introducir sin la directiva lang</code>
                            <br/>
                            <code>value (No requerido) - Añade un valor por defecto al input</code>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title">Componente Input Password</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <pre class="language-html">
                                <code>
                                    &lt;x-inputs.password col="col-12 col-lg-6" label="global.password" name="password" /&gt;
                                </code>
                            </pre>
                            <x-inputs.password label="global.password" name="password" />
                        </div>
                        <div class="col-12 col-lg-6">
                        <h5>Props</h5>
                        <code>name (Requerido) - Name del input</code>
                        <br/>
                        <code>col (No requerido) - Utiliza las clases que corresponden al grid de Bootstrap</code>
                        <br/>
                        <code>label (No Requerido) - Sin la directiva lang de Laravel</code>
                        <br/>
                        <code>placeholder (No Requerido) - Sin la directiva lang de Laravel</code>
                        <br/>
                        <code>id (No requerido) - Id del input</code>
                        <br/>
                        <code>class (No requerido) - Clases que se agregarán al atributo class del elemento</code>
                        <br/>
                        <code>disabled (No requerido) - Deshabilita el input</code>
                        <br/>
                        <code>readOnly (No requerido) - Establece el input como solo lectura</code>
                        <br/>
                        <code>required (No requerido) - Establece el input como requerido</code>
                        <br/>
                        <code>help (No requerido) - Añade un subtítulo en gris junto al label. Introducir sin la directiva lang</code>
                        <br/>
                        <code>value (No requerido) - Añade un valor por defecto al input</code>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title">Componente Textarea</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <pre class="language-html">
                                <code>
                                    &lt;x-textareas.textarea col="col-12 col-lg-6" rows="6" label="global.password" name="password" /&gt;
                                </code>
                            </pre>
                            <x-textareas.textarea label="global.observations" name="observations" rows="6" />
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5>Props</h5>
                            <code>name (Requerido) - Name del input</code>
                            <br/>
                            <code>col (No requerido) - Utiliza las clases que corresponden al grid de Bootstrap</code>
                            <br/>
                            <code>label (No Requerido) - Sin la directiva lang de Laravel</code>
                            <br/>
                            <code>placeholder (No Requerido) - Sin la directiva lang de Laravel</code>
                            <br/>
                            <code>id (No requerido) - Id del input</code>
                            <br/>
                            <code>class (No requerido) - Clases que se agregarán al atributo class del elemento</code>
                            <br/>
                            <code>disabled (No requerido) - Deshabilita el input</code>
                            <br/>
                            <code>readOnly (No requerido) - Establece el input como solo lectura</code>
                            <br/>
                            <code>required (No requerido) - Establece el input como requerido</code>
                            <br/>
                            <code>value (No requerido) - Añade un valor por defecto al input</code>
                            <br/>
                            <code>counter (No requerido) (counter="140") - Añade un contador de caracteres al textarea</code>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title">Componente Input Date</h4>
                        </div>
                        <div class="col-12">
                            <a href="https://amsul.ca/pickadate.js/" target="_blank">Link a la página oficial</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <pre class="language-html">
                                <code>
                                    &lt;x-inputs.date col="col-12 col-lg-6" id="pickadate" label="global.date" name="date" /&gt;
                                    &lt;div id="root-picker-outlet-pickadate" style="position:relative"&gt;&lt;/div&gt;
                                </code>
                            </pre>
                            El id del div debe ser el mismo que el del container de la inicialización
                            <pre class="language-html">
                                <code>
                                    $('#id_del_date').pickadate({
                                        container: '#root-picker-outlet-id_del_date',
                                        format: 'dd/mm/yyyy',
                                        formatSubmit: 'yyyy-mm-dd',
                                        selectYears: true,
                                        selectMonths: true,
                                        hiddenPrefix: '',
                                        hiddenSuffix: ''
                                    });
                                </code>
                            </pre>
                            <h5>Dependencias</h5>
                            <pre class="language-html">
                                <code>
                                    &lt;!--CSS--&gt;
                                    &lt;link rel="stylesheet" href="@{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}"&gt;
                                    &lt;link rel="stylesheet" href="@{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}"&gt;
                                    &lt;!--JS--&gt;
                                    &lt;script src="@{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"&gt;&lt;/script&gt;
                                    &lt;script src="@{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"&gt;&lt;/script&gt;
                                    &lt;script src="@{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"&gt;&lt;/script&gt;
                                    &lt;!--Traducción app locale--&gt;
                                    &lt;script src="@{{ asset(mix('vendors/js/pickers/pickadate/translations/'.app()->getLocale().'.js')) }}"&gt;&lt;/script&gt;
                                </code>
                            </pre>
                            <x-inputs.date label="global.date" name="date" id="pickadate" />
                            <div id="root-picker-outlet-pickadate" style="position:relative"></div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5>Props</h5>
                            <code>name (Requerido) - Name del input</code>
                            <br/>
                            <code>id (Requerido) - Id del input</code>
                            <br/>
                            <code>col (No requerido) - Utiliza las clases que corresponden al grid de Bootstrap</code>
                            <br/>
                            <code>label (No Requerido) - Sin la directiva lang de Laravel</code>
                            <br/>
                            <code>placeholder (No Requerido) - Sin la directiva lang de Laravel</code>
                            <br/>
                            <code>class (No requerido) - Clases que se agregarán al atributo class del elemento</code>
                            <br/>
                            <code>disabled (No requerido) - Deshabilita el input</code>
                            <br/>
                            <code>required (No requerido) - Establece el input como requerido</code>
                            <br/>
                            <code>value (No requerido) - Añade un valor por defecto al input</code>
                            <br/>
                        </div>
                    </div>
                    <hr/>

                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title">Componente Input Time</h4>
                        </div>
                        <div class="col-12">
                            <a href="https://amsul.ca/pickadate.js/" target="_blank">Link a la página oficial</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <pre class="language-html">
                                <code>
                                    &lt;x-inputs.time col="col-12 col-lg-6" id="pickatime" label="global.time" name="time" /&gt;
                                    &lt;div id="root-picker-outlet-pickatime" style="position:relative"&gt;&lt;/div&gt;
                                </code>
                            </pre>
                            El id del div debe ser el mismo que el del container de la inicialización
                            <pre class="language-html">
                                <code>
                                    $('#pickatime').pickatime({
                                        container: '#root-picker-outlet-pickatime',
                                        format: 'HH:i'
                                    });
                                </code>
                            </pre>
                            <h5>Dependencias</h5>
                            <pre class="language-html">
                                <code>
                                    &lt;!--CSS--&gt;
                                    &lt;link rel="stylesheet" href="@{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}"&gt;
                                    &lt;!--JS--&gt;
                                    &lt;script src="@{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"&gt;&lt;/script&gt;
                                    &lt;script src="@{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"&gt;&lt;/script&gt;
                                    &lt;script src="@{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"&gt;&lt;/script&gt;
                                    &lt;!--Traducción app locale--&gt;
                                    &lt;script src="@{{ asset(mix('vendors/js/pickers/pickadate/translations/'.app()->getLocale().'.js')) }}"&gt;&lt;/script&gt;
                                </code>
                            </pre>
                            <x-inputs.time label="global.time" name="time" id="pickatime" />
                            <div id="root-picker-outlet-pickatime" style="position:relative"></div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5>Props</h5>
                            <code>name (Requerido) - Name del input</code>
                            <br/>
                            <code>id (Requerido) - Id del input</code>
                            <br/>
                            <code>col (No requerido) - Utiliza las clases que corresponden al grid de Bootstrap</code>
                            <br/>
                            <code>label (No Requerido) - Sin la directiva lang de Laravel</code>
                            <br/>
                            <code>placeholder (No Requerido) - Sin la directiva lang de Laravel</code>
                            <br/>
                            <code>class (No requerido) - Clases que se agregarán al atributo class del elemento</code>
                            <br/>
                            <code>disabled (No requerido) - Deshabilita el input</code>
                            <br/>
                            <code>required (No requerido) - Establece el input como requerido</code>
                            <br/>
                            <code>value (No requerido) - Añade un valor por defecto al input</code>
                            <br/>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title">Componente Select Básico</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <pre class="language-html">
                                <code>
                                    &lt;x-selects.basic col="col-12 col-lg-6" :options="$users" optionValue="id" display="name" name="test" /&gt;
                                </code>
                            </pre>
                            <h5>Single</h5>
                            <x-selects.basic label="global.user" :options="$users" optionValue="id" display="name" name="test" :selected="$userSelected" />
                            <h5>Múltiple</h5>
                            <x-selects.basic label="global.user" :options="$users" optionValue="id" display="name" name="test" multiple="multiple" :selected="$usersSelected"  />
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5>Props</h5>
                            <code>name (Requerido) - Name del input</code>
                            <br/>
                            <code>:options (Requerido) - Array o collection</code>
                            <br/>
                            <code>optionValue (Requerido) - propiedad que lleva el valor del atributo value del option</code>
                            <br/>
                            <code>display (Requerido) - propiedad que lleva el valor que se mostrará en el option del select</code>
                            <br/>
                            <code>multiple (No requerido) - Hace múltiple el select</code>
                            <br/>
                            <code>id (No requerido) - Id del input</code>
                            <br/>
                            <code>col (No requerido) - Utiliza las clases que corresponden al grid de Bootstrap</code>
                            <br/>
                            <code>label (No Requerido) - Sin la directiva lang de Laravel</code>
                            <br/>
                            <code>class (No requerido) - Clases que se agregarán al atributo class del elemento</code>
                            <br/>
                            <code>disabled (No requerido) - Deshabilita el input</code>
                            <br/>
                            <code>required (No requerido) - Establece el input como requerido</code>
                            <br/>
                            <code>value (No requerido) - Añade un valor por defecto al select</code>
                            <br/>
                            <code>includeSelectOptionTitle (No requerido) - Añade como primera option el título "Seleccione una opción..."</code>
                            <br/>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title">Componente Select2</h4>
                        </div>
                        <div class="col-12">
                            <a href="https://select2.org/" target="_blank">Link a la página oficial</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <pre class="language-html">
                                <code>
                                    &lt;x-selects.select2 col="col-12 col-lg-6" :options="$users" optionValue="id" display="name" name="test" class="select2" /&gt;
                                </code>
                            </pre>
                            <pre class="language-html">
                                <code>
                                    $('.select2').select2();
                                </code>
                            </pre>
                            <h5>Dependencias</h5>
                            <pre class="language-html">
                                <code>
                                    &lt;!--CSS--&gt;
                                    &lt;link rel="stylesheet" href="@{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}"&gt;
                                    &lt;!--JS--&gt;
                                    &lt;script src="@{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"&gt;&lt;/script&gt;
                                </code>
                            </pre>
                            <h5>Single</h5>
                            <x-selects.select2 label="global.user" :options="$users" optionValue="id" display="name" name="test" class="select2" :selected="$userSelected" />
                            <h5>Múltiple</h5>
                            <x-selects.select2 label="global.user" :options="$users" optionValue="id" display="name" name="test" class="select2" :selected="$usersSelected" multiple="multiple" />
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5>Props</h5>
                            <code>name (Requerido) - Name del input</code>
                            <br/>
                            <code>:options (Requerido) - Array o collection</code>
                            <br/>
                            <code>optionValue (Requerido) - propiedad que lleva el valor del atributo value del option</code>
                            <br/>
                            <code>display (Requerido) - propiedad que lleva el valor que se mostrará en el option del select</code>
                            <br/>
                            <code>multiple (No requerido) - Hace múltiple el select</code>
                            <br/>
                            <code>id (No requerido) - Id del input</code>
                            <br/>
                            <code>col (No requerido) - Utiliza las clases que corresponden al grid de Bootstrap</code>
                            <br/>
                            <code>label (No Requerido) - Sin la directiva lang de Laravel</code>
                            <br/>
                            <code>class (No requerido) - Clases que se agregarán al atributo class del elemento</code>
                            <br/>
                            <code>disabled (No requerido) - Deshabilita el input</code>
                            <br/>
                            <code>required (No requerido) - Establece el input como requerido</code>
                            <br/>
                            <code>value (No requerido) - Añade un valor por defecto al select</code>
                            <br/>
                            <code>includeSelectOptionTitle (No requerido) - Añade como primera option el título "Seleccione una opción..."</code>
                            <br/>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title">Componente Switch</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <pre class="language-html">
                                <code>
                                    &lt;x-checkboxes.switch-checkbox color="success" label="Test" id="switch" name="test" /&gt;
                                </code>
                            </pre>
                            <h5>Label externo</h5>
                            <x-checkboxes.switch-checkbox color="success" label="Notificaciones" id="switch" name="test" />
                            <x-checkboxes.switch-checkbox color="danger" label="Perfil privado" id="switch2" name="test" />
                            <h5>Label interno</h5>
                            <x-checkboxes.switch-checkbox color="primary" labelLeft="On" labelRight="Off" id="switch3" name="test" size="md" />
                            <h5>Con icono</h5>
                            <x-checkboxes.switch-checkbox color="dark" label="Perfil privado" id="switch4" name="test" iconLeft="check" iconRight="x"/>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5>Props</h5>
                            <code>id (Requerido) - Id del input</code>
                            <br/>
                            <code>name (Requerido) - Name del input</code>
                            <br/>
                            <code>color (Requerido) - Acepta primary - success - danger - info - warning - dark</code>
                            <br/>
                            <code>label (No Requerido) - Sin la directiva lang de Laravel</code>
                            <br/>
                            <code>labelLeft (No requerido) - Añade un label interno dentro del switch en la parte izquierda</code>
                            <br/>
                            <code>labelRight (No requerido) - Añade un label interno dentro del switch en la parte derecha</code>
                            <br/>
                            <code>disabled (No requerido) - Deshabilita el input</code>
                            <br/>
                            <code>required (No requerido) - Establece el switch como requerido</code>
                            <br/>
                            <code>checked (No requerido) - Establece el switch como checked</code>
                            <br/>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title">Componente Checkbox</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <pre class="language-html">
                                <code>
                                    &lt;x-checkboxes.checkbox color="success" label="Test" id="checkbox" name="test" value="test" /&gt;
                                </code>
                            </pre>
                            <h5>Básico</h5>
                            <x-checkboxes.checkbox color="success" label="Test" value="true" name="test" />
                            <h5>Con icono</h5>
                            <x-checkboxes.checkbox color="success" label="Test" value="true" name="test" icon="users" />
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5>Props</h5>
                            <code>name (Requerido) - Name del input</code>
                            <br/>
                            <code>color (Requerido) - Acepta primary - success - danger - info - warning - dark</code>
                            <br/>
                            <code>label (Requerido) - Sin la directiva lang de Laravel</code>
                            <br/>
                            <code>id (No requerido) - Id del input</code>
                            <br/>
                            <code>disabled (No requerido) - Deshabilita el input</code>
                            <br/>
                            <code>required (No requerido) - Establece el switch como requerido</code>
                            <br/>
                            <code>checked (No requerido) - Establece el switch como checked</code>
                            <br/>
                            <code>icon (No requerido) - Cambia el icono del checkbox cuando está checked. Utiliza Feather icons</code>
                            <br/>
                            <code>class (No requerido) - Añade clases al input</code>
                            <br/>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title">Componente Radio</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <pre class="language-html">
                                <code>
                                    &lt;x-radios.radio color="success" label="Test" id="checkbox" name="test" value="true" /&gt;
                                </code>
                            </pre>
                            <x-radios.radio color="success" label="Verde" value="true" name="test" />
                            <x-radios.radio color="primary" label="Azul" value="true" name="test" />
                            <x-radios.radio color="danger" label="Rojo" value="true" name="test" />
                            <x-radios.radio color="warning" label="Naranja" value="true" name="test" />
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5>Props</h5>
                            <code>name (Requerido) - Name del input</code>
                            <br/>
                            <code>color (Requerido) - Acepta primary - success - danger - info - warning - dark</code>
                            <br/>
                            <code>label (Requerido) - Sin la directiva lang de Laravel</code>
                            <br/>
                            <code>value (Requerido) - Añade un valor al radio</code>
                            <br/>
                            <code>id (No requerido) - Id del input</code>
                            <br/>
                            <code>disabled (No requerido) - Deshabilita el input</code>
                            <br/>
                            <code>required (No requerido) - Establece el radio como requerido</code>
                            <br/>
                            <code>checked (No requerido) - Establece el radio como checked</code>
                            <br/>
                            <code>class (No requerido) - Añade clases al input</code>
                            <br/>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title">Componente Button</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <pre class="language-html">
                                <code>
                                    &lt;x-buttons.button col="col-12" label="global.save" type="submit" color="primary" /&gt;
                                </code>
                            </pre>
                            <x-buttons.button label="global.save" type="submit" color="primary" />
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5>Props</h5>
                            <code>color (Requerido) - Acepta primary - success - danger - info - warning - dark</code>
                            <br/>
                            <code>label (Requerido) - Sin la directiva lang de Laravel</code>
                            <br/>
                            <code>type (Requerido) - El tipo de button. Submit o button</code>
                            <br/>
                            <code>id (No requerido) - Id del button</code>
                            <br/>
                            <code>col (No requerido) - Introduce en el class los col que se establezcan</code>
                            <br/>
                            <code>disabled (No requerido) - Deshabilita el button</code>
                            <br/>
                            <code>class (No requerido) - Añade clases a la etiqueta button</code>
                            <br/>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title">Componente Button Outline</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <pre class="language-html">
                                <code>
                                    &lt;x-buttons.outline col="col-12" label="global.save" type="submit" color="primary" /&gt;
                                </code>
                            </pre>
                            <x-buttons.outline label="global.save" type="submit" color="primary" />
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5>Props</h5>
                            <code>color (Requerido) - Acepta primary - success - danger - info - warning - dark</code>
                            <br/>
                            <code>label (Requerido) - Sin la directiva lang de Laravel</code>
                            <br/>
                            <code>type (Requerido) - El tipo de button. Submit o button</code>
                            <br/>
                            <code>id (No requerido) - Id del button</code>
                            <br/>
                            <code>col (No requerido) - Introduce en el class los col que se establezcan</code>
                            <br/>
                            <code>disabled (No requerido) - Deshabilita el button</code>
                            <br/>
                            <code>class (No requerido) - Añade clases a la etiqueta button</code>
                            <br/>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title">Componente Button con Icono</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <pre class="language-html">
                                <code>
                                    &lt;x-buttons.with-icon col="col-12" label="global.save" type="submit" color="primary" icon="users" /&gt;
                                </code>
                            </pre>
                            <x-buttons.with-icon label="global.save" type="submit" color="danger" icon="users" />
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5>Props</h5>
                            <code>color (Requerido) - Acepta primary - success - danger - info - warning - dark</code>
                            <br/>
                            <code>label (Requerido) - Sin la directiva lang de Laravel</code>
                            <br/>
                            <code>type (Requerido) - El tipo de button. Submit o button</code>
                            <br/>
                            <code>icon (Requerido) (Feather icons) - Icono del button</code>
                            <br/>
                            <code>id (No requerido) - Id del button</code>
                            <br/>
                            <code>col (No requerido) - Introduce en el class los col que se establezcan</code>
                            <br/>
                            <code>disabled (No requerido) - Deshabilita el button</code>
                            <br/>
                            <code>class (No requerido) - Añade clases a la etiqueta button</code>
                            <br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
    <!-- vendor files -->

    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>

    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>


    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    @if (app()->getLocale() !== 'en')
        <script src="{{ asset(mix('assets/js/template/pickadate/translations/'.app()->getLocale().'.js')) }}"></script>
        <script src="{{ asset(mix('assets/js/template/validation/messages_'.app()->getLocale().'.js')) }}"></script>
    @endif

    <script src="{{ asset(mix('assets/js/template/validation/validator-config-methods.js')) }}"></script>
    <script src="{{ asset(mix('assets/js/template/validation/validator-render-errors.js')) }}"></script>
@endsection

@section('page-script')
    <!-- Page js files -->
    <script>
        $('#pickadate').pickadate({
            container: '#root-picker-outlet-pickadate',
            format: 'dd/mm/yyyy',
            selectYears: true,
            selectMonths: true
        });

        $('#pickatime').pickatime({
            container: '#root-picker-outlet-pickatime',
            format: 'HH:i'
        });

        $('.select2').select2();

        $(".select2-icons").select2({
            dropdownAutoWidth: true,
            maximumSelectionLength: 4,
            width: '100%',
            minimumResultsForSearch: Infinity,
            templateResult: iconFormat,
            templateSelection: iconFormat,
            escapeMarkup: function(es) { return es; }
        });

        let validation = JSON.parse('{!! json_encode(config('user.front.validation.create.rules')) !!}');
        let messages = JSON.parse('{!! json_encode(config('user.front.validation.create.messages')) !!}')

        messages.password.pwcheck = '{{ __('validation.pwcheck', ['numcharacter' => 8]) }}'

        $('#create-user').validate({
            lang: '{{app()->getLocale()}}',
            rules: validation,
            messages: messages
        });

        // Format icon
        function iconFormat(icon) {
            var originalOption = icon.element;
            if (!icon.id) { return icon.text; }
            var $icon = "<i class='" + $(icon.element).data('icon') + "'></i>" + icon.text;

            return $icon;
        }

    </script>
@endsection



