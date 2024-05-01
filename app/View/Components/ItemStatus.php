<?php

namespace App\View\Components;

use App\Models\Justificativa;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemStatus extends Component
{
    
    public $i;
    public $msg;
    public $jus;
    public $disp;
    public $req;

    public function __construct($num, $message, $justif)
    {
        $this->i = $num;
        $this->msg = $message;
        $this->jus = $justif;
        $this->disp = "display: none;";
        $this->req = '';

        // Justification will only be shown if it exists
        if (isset($this->jus[$num])) {
            $this->disp = "";
            $this->req = 'required';
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.item-status');
    }
}
