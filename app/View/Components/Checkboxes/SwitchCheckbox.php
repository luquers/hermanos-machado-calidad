<?php

namespace App\View\Components\Checkboxes;

use Illuminate\View\Component;

class SwitchCheckbox extends Component
{
    /**
     * @var string
     */
    public $name;

    /**
     * Id componente
     *
     * @var string
     */
    public $id;

    /**
     * Label externo componente
     *
     * @var string
     */
    public $label;

    /**
     * Color componente primary - success - danger - info - warning - dark
     *
     * @var string
     */
    public $color;

    /**
     * Label en el interior del switch cuando está activado
     *
     * @var string
     */
    public $labelLeft;

    /**
     * Label en el interior del switch cuando está desactivado
     *
     * @var string
     */
    public $labelRight;

    /**
     * Icono en el interior del switch cuando está activado (feather icons)
     *
     * @var string
     */
    public $iconLeft;

    /**
     * Icono en el interior del switch cuando está desactivado (feather icons)
     *
     * @var string
     */
    public $iconRight;

    /**
     * Tamaño del switch (md | lg)
     *
     * @var string
     */
    public $size;

    /**
     * Añade clases al input
     *
     * @var string
     */
    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $color, $id, $label = '', $labelLeft = '', $labelRight = '', $size = '', $iconLeft = '', $iconRight = '', $class = '')
    {
        $this->name = $name;
        $this->color = $color;
        $this->id = $id;
        $this->label = $label;
        $this->labelLeft = $labelLeft;
        $this->labelRight = $labelRight;
        $this->size = $size;
        $this->iconLeft = $iconLeft;
        $this->iconRight = $iconRight;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.checkboxes.switch-checkbox');
    }
}
