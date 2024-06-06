<?php

namespace App\View\Components;

use App\Models\Justificativa;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemStatus extends Component
{
    public $ok_color;
    public $re_color;
    public $tr_color;
    public $ok_checked;
    public $re_checked;
    public $tr_checked;
    public $i;
    public $msg;
    public $jus;
    public $disp;
    public $req;
    public $pend_ant;
    public $bgc;

    public function __construct($num, $message, $justif, $stat = null)
    {
        $this->i = $num;
        $this->msg = $message;
        $this->jus = $justif;
        $this->disp = "display: none;";
        $this->req = '';
        $this->pend_ant = '';
        $this->bgc = '';
        $this->ok_color = '';
        $this->re_color = '';
        $this->tr_color = '';
        $this->ok_checked = '';
        $this->re_checked = '';
        $this->tr_checked = '';

        if ($stat == 'Trocar') {
            $this->tr_color = 'color:red';
            $this->tr_checked = 'checked';
        } elseif ($stat == 'Ok') {
            $this->ok_color = 'color:rgb(41, 50, 184)';
            $this->ok_checked = 'checked';
        } elseif ($stat == 'Recuperar') {
            $this->re_color = 'color:rgb(100, 100, 100)';
            $this->re_checked = 'checked';
        }

        // Justification will only be shown if it exists
        if (isset($this->jus[$num])) {
            $this->req = 'required';
            $this->pend_ant = 'Pendência anterior: ';
            //$this->bgc = 'background-color:rgb(239, 239, 174);';

        }
    }

    public function render(): View|Closure|string
    {
        return view('components.item-status');
    }
}
