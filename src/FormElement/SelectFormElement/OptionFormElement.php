<?php

namespace HtmlFormBuilder\FormElement\SelectFormElement;

use HtmlFormBuilder\FormElement\PrimitiveFormElement;

class OptionFormElement extends PrimitiveFormElement
{
    public function render(): string
    {
        $attributes = $this->getAttributesString() !== "" ?
            (" " . $this->getAttributesString()) :
            "";
        $html = "<option$attributes>{$this->tag_value}</option>";

        return $html;
    }
}