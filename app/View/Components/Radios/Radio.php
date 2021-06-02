<?php

namespace App\View\Components\Radios;

use Illuminate\View\Component;

class Radio extends Component
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $value;

    /**
     * @var string - primary, success, danger, info, warning
     */
    public $color;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label, $value, $color = '')
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.radios.radio');
    }
}
