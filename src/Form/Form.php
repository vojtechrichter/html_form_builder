<?php declare(strict_types=1);

namespace HtmlFormBuilder\Form;

use HtmlFormBuilder\Form\Attribute\FormAttribute;
use HtmlFormBuilder\FormElement\FormElementIterator;

class Form
{
    /** @var FormAttribute[] $attributes */
    private array $attributes = [];
    private FormElementIterator $element_iterator;

    public function __construct(FormElementIterator $element_iterator)
    {
        $this->element_iterator = $element_iterator;
    }

    public function addAttribute(FormAttribute $form_attribute): self
    {
        $this->attributes[] = $form_attribute;

        return $this;
    }

    public function render(): string
    {
        $elements = "";
        foreach ($this->element_iterator as $element) {
            $elements .= $element->render();
        }

        $form_attributes = "";
        foreach ($this->attributes as $idx => $attribute) {
            $form_attributes .= ($idx === count($this->attributes) - 1) ?
                $attribute->render() :
                ($attribute->render() . " ");
        }

        $final_form_html = "<form $form_attributes>$elements</form>";

        return $final_form_html;
    }
}