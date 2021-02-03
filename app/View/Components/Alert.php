<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $content;
    public $type;
    public $class;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($content, $type = 'success', $class = null)
    {
        $this->content = $content;
        $this->type = $type;
        $this->classes = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
