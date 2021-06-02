<?php

namespace App\View\Components\Textareas;

use Illuminate\View\Component;

class Textarea extends Component
{
    /**
     * @var string
     */
    public $col;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $placeholder;

    /**
     * @var int
     */
    public $rows;

    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $value;

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
    public $name;

    /**
     * @var string;
     */
    public $counter;

    /**
     * @var string;
     */
    public $disabled;

    /**
     * @var string;
     */
    public $readOnly;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $rows, $id = '', $placeholder = '', $label = '', $value = '', $class = '', $required = '', $counter = '', $readOnly = '', $disabled = '', $col = '')
    {
        $this->name = $name;
        $this->col = $col;
        $this->rows = $rows;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->label = $label;
        $this->value = $value;
        $this->class = $class;
        $this->required = $required;
        $this->counter = $counter;
        $this->disabled = $disabled;
        $this->readOnly = $readOnly;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.textareas.textarea');
    }
}
