<?php

namespace App\View\Components\Inputs;

use App\Traits\ComponentsValidations;
use Illuminate\View\Component;

class Number extends Component
{
    use ComponentsValidations;

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
     * Pasos de número a número
     *
     * @var string
     */
    public $step;

    /**
     * Número mínimo
     *
     * @var string
     */
    public $min;

    /**
     * Número máximo
     *
     * @var string
     */
    public $max;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($col, $label, $name, $step, $min, $max, $class = '', $disabled = '', $readOnly = '', $value = '', $help = '', $id = '', $required = '')
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
        $this->step = $step;
        $this->min = $min;
        $this->max = $max;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.inputs.number');
    }
}
