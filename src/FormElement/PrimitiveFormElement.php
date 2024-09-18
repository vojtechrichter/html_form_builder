<?php declare(strict_types=1);

namespace HtmlFormBuilder\FormElement;

use HtmlFormBuilder\FormElement\FormElementAttribute\FormElementAttribute;

abstract class PrimitiveFormElement
{
    protected string $tag_value;
    /** @var FormElementAttribute[] $attributes */
    protected array $attributes = [];

    public function __construct(string $tag_value = "")
    {
        $this->tag_value = $tag_value;
    }

    public function addAttribute(FormElementAttribute $attribute): self
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