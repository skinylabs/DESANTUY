<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteModal extends Component
{

    public $id;
    public $name;
    public $action;
    /**
     * Create a new component instance.
     */
    public function __construct($id, $name, $action)
    {
        $this->id = $id;
        $this->name = $name;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.delete-modal');
    }
}
