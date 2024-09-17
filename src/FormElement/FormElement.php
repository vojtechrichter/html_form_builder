<?php declare(strict_types=1);

namespace HtmlFormBuilder\FormElement;

use HtmlFormBuilder\FormElement\FormAttribute\FormAttribute;

abstract class FormElement
{
    protected string $name;
    protected string $label;

    /** @var FormAttribute[] $attributes */
    protected array $attributes = [];

    public function __construct(string $name, string $label = "")
    {
        $this->name = $name;
        if ($label !== "") {
            $this->label = $label;
        }
    }

    public function addAttribute(FormAttribute $attribute): void
    {
        $this->attributes[] = $attribute;
    }
}