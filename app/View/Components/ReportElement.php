<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ReportElement extends Component
{
    
    public $i;
    public $descrs;
    public $r;

    public function __construct($num, $descriptions, $relat)
    {
        $this->i = $num;
        $this->descrs = $descriptions;
        $this->r = $relat;
    }

    public function render(): View|Closure|string
    {
        return view('components.report-element');
    }
}
