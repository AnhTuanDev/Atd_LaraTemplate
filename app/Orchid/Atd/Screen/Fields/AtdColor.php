<?php

declare(strict_types  =1);

namespace App\Orchid\Atd\Screen\Fields;

use Orchid\Screen\Field;
use Orchid\Screen\Action;

class AtdColor extends Field
{
    protected $view = 'orchid.fields.color';

    protected $attributes = [
        'class'      => 'btn btn-sm',
        'type'       => 'button',
        'turbo' => true,
    ];

    protected $inlineAttributes = [
        'data' => null,
        'href',
        'disabled',
    ];

    public function data( $post = ''): self
    {
        $this->set('data', $post);

        return $this;
    }

    public function href(string $link = ''): self
    {
        $this->set('href', $link);

        return $this;
    }

    public function route(string $name, $parameters = [], $absolute = true): self
    {
        $route = route($name, $parameters, $absolute);

        return $this->href($route);
    }

}
