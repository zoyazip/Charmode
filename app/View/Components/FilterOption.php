<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FilterOption extends Component
{
    public $title;
    public $symbol;
    public $minName;
    public $maxName;
    public $minValue;
    public $maxValue;
    public $placeholderMin;
    public $placeholderMax;

    public function __construct($title, $symbol, $minName, $maxName, $minValue = '', $maxValue = '', $placeholderMin = 'Min', $placeholderMax = 'Max')
    {
        $this->title = $title;
        $this->symbol = $symbol;
        $this->minName = $minName;
        $this->maxName = $maxName;
        $this->minValue = $minValue;
        $this->maxValue = $maxValue;
        $this->placeholderMin = $placeholderMin;
        $this->placeholderMax = $placeholderMax;
    }

    public function render()
    {
        return view('components.filter-option');
    }
}
