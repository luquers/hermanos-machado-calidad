<?php

namespace App\View\Components\Selects;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Basic extends Component
{

    /**
     * @var string
     */
    public $col;

    /**
     * @var string
     */
    public $label;

    /**
     * @var array
     */
    public $options;

    /**
     * @var string
     */
    public $optionValue;

    /**
     * @var string
     */
    public $selected;

    /**
     * @var string
     */
    public $display;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $class;

    /**
     * @var string
     */
    public $required;

    /**
     * @var string
     */
    public $disabled;

    /**
     * @var string;
     */
    public $multiple;

    /**
     * @var string;
     */
    public $name;

    /**
     * @var string
     */
    public $includeSelectOptionTitle;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $optionValue, $display, $label = '', $options = [], $id = '', $class = '', $required = '', $disabled = '', $multiple = '', $col = '', $selected = '', $includeSelectOptionTitle = '')
    {
        $this->col = $col;
        $this->label = $label;
        $this->options = $options;
        $this->optionValue = $optionValue;
        $this->selected = $selected;
        $this->display = $display;
        $this->id = $id;
        $this->class = $class;
        $this->required = $required;
        $this->disabled = $disabled;
        $this->multiple = $multiple;
        $this->name = $name;
        $this->includeSelectOptionTitle = $includeSelectOptionTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.selects.basic');
    }

    /**
     * Determine if the given option is the current selected option.
     *
     * @param  string $option
     * @return bool
     */
    public function isSelected($option) :bool
    {
        if (is_array($this->selected)) {
            return in_array($option, array_column($this->selected, $this->optionValue));
        }

        if ($this->selected instanceof Illuminate\Database\Eloquent\Collection || $this->selected instanceof \Illuminate\Support\Collection) {
            return $this->selected->contains($this->optionValue, $option);
        }

        $optionValue = $this->optionValue;

        if ($this->selected instanceof Model) {
            return $option == $this->selected->$optionValue;
        }

        return $option == $this->selected;
    }

    /**
     * Si viene la opción se incluirá como primera opción "Seleccione una opción..." con valor nulo
     *
     * @param string $includeSelectOptionTitle
     * @return bool
     */

    public function isIncludedSelectOptionTitle ($includeSelectOptionTitle) :bool {
       return $includeSelectOptionTitle ? true : false;
    }
}
