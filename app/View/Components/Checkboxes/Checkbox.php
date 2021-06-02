<?php

namespace App\View\Components\Checkboxes;

use Illuminate\View\Component;

class Checkbox extends Component
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $value;

    /**
     * @var string - primary, success, danger, info, warning
     */
    public $color;

    /**
     * @var string
     */
    public $checked;

    /**
     * @var string
     */
    public $label;

    /**
     * Feather icons ej: users
     * @var string
     */
    public $icon;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $value, $label, $icon = '', $checked = '', $color = '', $id = '', $class = '')
    {
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->icon = $icon;
        $this->checked = $checked;
        $this->color = $color;
        $this->id = $id;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.checkboxes.checkbox');
    }
}
