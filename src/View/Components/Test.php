<?php

namespace JordenPowleyWebDev\LaravelComponents\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Class Test
 * @package JordenPowleyWebDev\LaravelComponents\View\Components
 */
class Test extends Component
{
    /**
     * @var string
     */
    public string $message = "Test Component Message";

    /**
     * Test::__construct()
     *
     * @param string|null $message
     */
    public function __construct(string $message = null)
    {
        $this->message = filled($message) ? $message : $this->message;
    }

    /**
     * Test::render()
     *
     * @return \Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|\Closure|Application
    {
        return view('laravel-components::components.test');
    }
}