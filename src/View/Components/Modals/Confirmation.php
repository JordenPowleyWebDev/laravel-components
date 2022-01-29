<?php

namespace JordenPowleyWebDev\LaravelComponents\View\Components\Modals;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use function config;
use function filled;
use function view;

/**
 * Class Confirmation
 */
class Confirmation extends Component
{
    /**
     * @var string
     */
    public string $id = "confirmation-modal";

    /**
     * @var string
     */
    public string $action = "";

    /**
     * @var string|null
     */
    public ?string $restMethod = null;

    /**
     * @var string
     */
    public string $formMethod = "POST";

    /**
     * @var string
     */
    public string $title = "";

    /**
     * @var string
     */
    public string $confirmationText = "";

    /**
     * @var string
     */
    public string $cancellationButtonText = "Cancel";

    /**
     * @var string
     */
    public string $confirmationButtonText = "Confirm";

    /**
     * @var array|null
     */
    public ?array $classes;

    /**
     * @var array
     */
    public array $inputAttributes = [];

    /**
     * Confirmation::__construct()
     *
     * @param string $id
     * @param string $action
     * @param string $method
     * @param string $title
     * @param string $confirmationText
     * @param string $cancellationButtonText
     * @param string $confirmationButtonText
     * @param array $classes
     * @param array $attributes
     */
    public function __construct(string $id, string $action, string $method, string $title, string $confirmationText, string $cancellationButtonText = "Cancel", string $confirmationButtonText = "Confirm", array $classes = [], array $attributes = [])
    {
        $this->id                       = $id;
        $this->action                   = $action;
        $this->title                    = $title;
        $this->confirmationText         = $confirmationText;
        $this->cancellationButtonText   = $cancellationButtonText;
        $this->confirmationButtonText   = $confirmationButtonText;
        $this->inputAttributes          = $attributes;

        switch (strtoupper($method)) {
            case 'HEAD':
            case 'GET':
                $this->formMethod = "GET";
                $this->restMethod = null;
                break;
            case 'POST':
                $this->formMethod = "POST";
                $this->restMethod = null;
                break;
            case 'PATCH':
                $this->formMethod = "POST";
                $this->restMethod = "PATCH";
                break;
            case 'DELETE':
                $this->formMethod = "POST";
                $this->restMethod = "DELETE";
                break;
        }

        // Construct the classes for the components
        $this->classes = [];
        foreach (['container', 'modal-dialog', 'form', 'modal-content', 'modal-header', 'modal-title', 'modal-body', 'confirmation-text', 'modal-footer', 'confirmation-button', 'cancel-button'] as $item) {
            $itemClass = config('laravel-components.views-namespace')."-modals-confirmation-".$item;
            $this->classes[$item] = $itemClass." ".config('laravel-components.default-classes.components.modals.confirmation.'.$item);

            if (array_key_exists($item, $classes) && filled($classes[$item])) {
                $this->classes[$item] .= " ".$classes[$item];
            }
        }
    }

    /**
     * Confirmation::render()
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render(): View|Factory|Htmlable|string|Closure|Application
    {
        return view('laravel-components::components.modals.confirmation');
    }
}