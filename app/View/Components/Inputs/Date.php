<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class Date extends Component
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
    public function __construct($name, $id, $class = '', $disabled = '', $value = '', $required = '', $col = '', $label = '')
    {
        $this->col = $col;
        $this->label = $label;
        $this->name = $name;
        $this->class = $class;
        $this->disabled = $disabled;
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
        return view('components.inputs.date');
    }
}
