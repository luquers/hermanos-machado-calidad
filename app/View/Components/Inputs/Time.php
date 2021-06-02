<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class Time extends Component
{
    /**
     * Tamaño componente
     *
     * @var string
     */
    public $col;

    /**
     * Label input
     *
     * @var string
     */
    public $label;

    /**
     * Name del componente
     *
     * @var string
     */
    public $name;

    /**
     * Clase del componente
     *
     * @var string
     */
    public $class;

    /**
     * Disabled componente
     *
     * @var string
     */
    public $disabled;

    /**
     * ReadOnly componente
     *
     * @var string
     */
    public $readOnly;

    /**
     * Value componente
     *
     * @var string
     */
    public $value;

    /**
     * Id componente
     *
     * @var string
     */
    public $id;

    /**
     * Required componente
     *
     * @var string
     */
    public $required;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $class = '', $disabled = '', $readOnly = '', $value = '', $id = '', $required = '', $col = '')
    {
        $this->col = $col;
        $this->label = $label;
        $this->name = $name;
        $this->class = $class;
        $this->disabled = $disabled;
        $this->readOnly = $readOnly;
        $this->value = $value;
        $this->id = $id;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.inputs.time');
    }
}
