<?php

namespace App\View\Components\Alerts;

use Illuminate\View\Component;

class Alert extends Component
{

    /**
     * Tipo de alert
     *
     * @var string
     *
     * primary, success, danger, warning, dark, info, light
     */
    public $type;

    /**
     * Mensaje del alert
     *
     * @var string
     *
     */
    public $message;



    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.alerts.alert');
    }
}
