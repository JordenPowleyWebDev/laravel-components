<?php

namespace JordenPowleyWebDev\LaravelComponents\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function render()
    {
        return view('laravel-components::components.alert');
    }
}