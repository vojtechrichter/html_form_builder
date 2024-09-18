<?php declare(strict_types=1);

namespace HtmlFormBuilder;

use HtmlFormBuilder\Form\Attribute\FormAttribute;
use HtmlFormBuilder\Form\Form;
use HtmlFormBuilder\FormElement\FormElement;
use HtmlFormBuilder\FormElement\FormElementCollection;

final class FormBuilder
{
    /** @var FormAttribute[] $form_attributes */
    private array $form_attributes = [];
    private FormElementCollection $elements;

    public function __construct()
    {
        $this->elements = new FormElementCollection();
    }

    public function addFormAttribute(FormAttribute $form_attribute): self
    {
        $this->form_attributes[] = $form_attribute;

        return $this;
    }

    public function addFormElement(FormElement $form_element): self
    {
        $this->elements->add($form_element);

        return $this;
    }

    public function build(): Form
    {
        $form = new Form($this->elements->getIterator());
        foreach ($this->form_attributes as $form_attribute) {
            $form->addAttribute($form_attribute);
        }

        return $form;
    }
}