<?php declare(strict_types=1);

namespace HtmlFormBuilder\Form\Attribute;

class FormAttribute implements \Stringable
{
    private string $name;
    private string $value;
    private bool $is_key_only;

    public function __construct(
        FormAttributeType $name,
        string $value = ""
    )
    {
        $this->name = $name->value;
        if ($value !== "") {
            $this->is_key_only = false;
        } else {
            $this->is_key_only = true;
        }
        $this->value = $value;
    }

    public function render(): string
    {
        $attribute_string = $this->is_key_only ?
            "{$this->name}" :
            "{$this->name}=\"{$this->value}\"";

        return $attribute_string;
    }

    public function __toString(): string
    {
        return $this->render();
    }
}