<?php declare(strict_types=1);

namespace HtmlFormBuilder\FormElement;

use HtmlFormBuilder\FormElement\FormAttribute\FormAttribute;

abstract class FormElement
{
    protected string $name;
    protected string $label;
    protected string $tag_value;

    /** @var FormAttribute[] $attributes */
    protected array $attributes = [];

    public function __construct(string $name, string $label = "", string $tag_value = "")
    {
        $this->name = $name;
        $this->label = $label;
        $this->tag_value = $tag_value;
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