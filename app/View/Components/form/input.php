<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class input extends Component
{
    public $type;
    public $name;
    public $value;
    public $class;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $type = 'text', $value = null, $class = null)
    {
        $this->name = $name;
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
        return view('components.form.input');
    }
}
