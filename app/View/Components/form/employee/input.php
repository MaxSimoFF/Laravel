<?php

namespace App\View\Components\form\employee;

use Illuminate\View\Component;

class input extends Component
{
    public $name;
    public $spanText;
    public $type;
    public $value;
    public $class;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $spanText, $value = null, $type = 'text', $class = null)
    {
        $this->name = $name;
        $this->spanText = $spanText;
        $this->type = $type;
        $this->value = $value ?? old($this->name);
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.form.employee.input');
    }
}
