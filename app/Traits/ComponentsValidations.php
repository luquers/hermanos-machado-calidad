<?php


namespace App\Traits;


trait ComponentsValidations {

    public function dataRequiredMessage() {
        return ['data' => 'data-validation-required-message', 'message' => 'El campo es requerido.'];
    }

    public function dataValidationMinMessage($min) {
        return ['data' => 'data-validation-min-message', 'message' => 'El valor no puede ser menor a '.$min];
    }

    public function dataValidationMaxMessage($max) {
        return ['data' => 'data-validation-max-message', 'message' => 'El valor no puede ser superior a '.$max];
    }

}