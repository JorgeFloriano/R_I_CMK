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
    public $zero;
    public $msg;
    public $jus;
    public $disp;
    public $req;
    public $pend_ant;
    public $c_important;
    public $class;
    public $image;
    public $image_exists;

    public function __construct($num, $message, $justif, $stat = null, $important = false, $report = null)
    {
        $this->i = $num;
        $this->zero = '';
        $this->msg = $message;
        $this->jus = $justif;
        $this->disp = "display: none;";
        $this->req = '';
        $this->ok_color = '';
        $this->re_color = '';
        $this->tr_color = '';
        $this->ok_checked = '';
        $this->re_checked = '';
        $this->tr_checked = '';
        $this->c_important = '';
        $this->class = 'normal';
        $this->image = '';
        $this->image_exists = null;

        if ($this->i < 10) {
            $this->zero = '0';
        }

        if ($important == true) {
            $this->c_important = '* ';
            $this->class = 'important';
        }
        if ($stat == 'Trocar') {
            $this->tr_color = 'color:#dc3545'; // boodstrap red
            $this->tr_checked = 'checked';
        } elseif ($stat == 'Ok') {
            $this->ok_color = 'color: #198754'; // boodstrap green
            $this->ok_checked = 'checked';
        } elseif ($stat == 'Recuperar') {
            $this->re_color = 'color:rgb(50, 50, 50)'; // dark gray
            $this->re_checked = 'checked';
        }

        // Justification will only be shown if it exists
        if (isset($this->jus[$num])) {
            $this->req = 'required';
        }

        // Image verification
        $this->image = 'storage/public/pend_photos/img_report'.$report.'_item'.$this->i.'.jpg';
        if (file_exists($this->image)) {
            $this->image_exists = true;
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.item-status');
    }
}
