<?php declare(strict_types=1);

namespace HtmlFormBuilder\FormElement\FormElementAttribute;

class FormElementAttribute implements \Stringable
{
    private string $key;
    private string $value;
    private FormElementAttributeValueDataType $value_data_type;
    private bool $is_key_only;

    /**
     * In case of an attribute with a value, $value_data_type should always be set.
     * Otherwise, the type will be inferred, and does not guarantee correct type.
     */
    public function __construct(
        string $key,
        string $value = "",
        FormElementAttributeValueDataType $value_data_type = FormElementAttributeValueDataType::STRING
    )
    {
        $this->key = $key;

        if ($value === "") {
            $this->is_key_only = true;
        } else {
            $this->value_data_type = $value_data_type;
            $this->value = $value;
            $this->is_key_only = false;
        }
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getValueDataType(): FormElementAttributeValueDataType
    {
        return $this->value_data_type;
    }

    public function isKeyOnly(): bool
    {
        return $this->is_key_only;
    }

    public function render(): string
    {
        $string_attr = $this->isKeyOnly() ?
            "$this->key" :
            "$this->key=" . (
                $this->getValueDataType() === FormElementAttributeValueDataType::STRING ?
                "\"$this->value\"" :
                intval($this->value)
            );

        return $string_attr;
    }

    public function __toString(): string
    {
        return $this->render();
    }
}