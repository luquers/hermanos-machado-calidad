<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class Button extends Component
{

    /**
     * Tamaño componente
     *
     * @var string
     */
    public $col;

    /**
     * Texto componente
     *
     * @var string
     */
    public $label;

    /**
     * Tipo componente
     *
     * @var string
     *
     * submit o button
     */
    public $type;

    /**
     * Color componente
     *
     * @var string
     *
     * Primary, Success, Info, Warning, Danger, Light, Dark
     */
    public $color;

    /**
     * Class componente
     *
     * @var string
     *
     * Resto de la clase
     */
    public $class;



    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $color, $label, $class = '', $col = '')
    {
        $this->type = $type;
        $this->col = $col;
        $this->class = $class;
        $this->color = $color;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.buttons.button');
    }
}
