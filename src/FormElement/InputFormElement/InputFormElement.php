<?php declare(strict_types=1);

namespace HtmlFormBuilder\FormElement\InputFormElement;

use HtmlFormBuilder\FormElement\FormElement;

final class InputFormElement extends FormElement
{
    private InputFormElementType $type;

    public function __construct(
        InputFormElementType $type,
        string $name,
        string $label = ""
    )
    {
        parent::__construct($name, $label);
        $this->type = $type;
    }

    public function render(): string
    {
        $label_html = $this->label !== "" ?
            "<label for=\"{$this->name}\">{$this->label}</label>" :
            "";
        $attributes_html = $this->getAttributesString();
        $final_html = "$label_html<input type=\"{$this->type->value}\" name=\"{$this->name}\" $attributes_html />";

        return $final_html;
    }
}