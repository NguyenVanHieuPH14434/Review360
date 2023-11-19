<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormSelect extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $select, 
        public $keySelect = null, 
        public $labelSelect = null,
        public string $label = '',
        public bool $required = false,
        public string $name = '',
        public $isSelected = null,
        public bool $select2 = false,
        public bool $select2Multi = false,
        public $class = "",
        public bool $hideLab = false,
        public $placeholder = "",
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-select');
    }
}
