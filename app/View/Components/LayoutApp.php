<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LayoutApp extends Component
{
    public $title;
    public function __construct($title = null)
    {
        $this->title = $title  ? $title : "DOT";
    }

    public function render()
    {
        return view('layouts.index');
    }
}
