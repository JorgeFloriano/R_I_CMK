<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemStatus extends Component
{
    
    public $i;
    public $msg;

    public function __construct($num, $message)
    {
        $this->i = $num;
        $this->msg = $message;
    }

    
    public function render(): View|Closure|string
    {
        return view('components.item-status');
    }
}
