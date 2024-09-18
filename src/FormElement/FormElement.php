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
        $this->label = $label;
    }

    public function addAttribute(FormAttribute $attribute): self
    {
        $this->attributes[] = $attribute;

        return $this;
    }

    protected function getAttributesString(): string
    {
        $attributes_str = "";
        foreach ($this->attributes as $attribute) {
            $attributes_str .= $attribute->render();
        }

        return $attributes_str;
    }

    abstract public function render(): string;
}