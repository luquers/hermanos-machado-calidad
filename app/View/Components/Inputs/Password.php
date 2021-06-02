<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class Password extends Component
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
     * Help componente
     *
     * @var string
     */
    public $help;

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
     * Placeholder componente
     *
     * @var string
     */
    public $placeholder;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $class = '', $disabled = '', $readOnly = '', $value = '', $help = '', $id = '', $required = '', $col = '', $label = '')
    {
        $this->col = $col;
        $this->label = $label;
        $this->name = $name;
        $this->class = $class;
        $this->disabled = $disabled;
        $this->readOnly = $readOnly;
        $this->value = $value;
        $this->help = $help;
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
        return view('components.inputs.password');
    }
}
