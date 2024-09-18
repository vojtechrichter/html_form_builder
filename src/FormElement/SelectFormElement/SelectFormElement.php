<?php declare(strict_types=1);

namespace HtmlFormBuilder\FormElement\SelectFormElement;

use HtmlFormBuilder\FormElement\FormElement;

final class SelectFormElement extends FormElement
{
    /** @var OptionFormElement[] $options */
    private array $options = [];

    public function addOption(OptionFormElement $option_element): self
    {
        $this->options[] = $option_element;

        return $this;
    }

    private function getOptionsString(): string
    {
        $options_html = "";
        foreach ($this->options as $option) {
            $options_html .= $option->render();
        }

        return $options_html;
    }

    public function render(): string
    {
        $label_html = $this->label !== "" ?
            "<label for=\"{$this->name}\">{$this->label}</label>" :
            "";
        $attributes_html = $this->getAttributesString();
        $options_html = $this->getOptionsString();
        $final_html = "$label_html<select name=\"{$this->name}\" $attributes_html>$options_html</select>";

        return $final_html;
    }
}