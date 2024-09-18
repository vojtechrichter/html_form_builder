<?php declare(strict_types=1);

namespace HtmlFormBuilder\FormElement\TextareaFormElement;

use HtmlFormBuilder\FormElement\FormElement;

final class TextareaFormElement extends FormElement
{
    public function render(): string
    {
        $label_html = $this->label !== "" ?
            "<label for=\"{$this->name}\">{$this->label}</label>" :
            "";
        $attributes_html = $this->getAttributesString();
        $final_html = "$label_html<textarea name=\"{$this->name}\" $attributes_html>{$this->tag_value}</textarea>";

        return $final_html;
    }
}