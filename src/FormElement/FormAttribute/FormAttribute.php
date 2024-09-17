<?php declare(strict_types=1);

namespace HtmlFormBuilder\FormElement\FormAttribute;

class FormAttribute implements \Stringable
{
    private string $key;
    private string $value;
    private FormAttributeValueDataType $value_data_type;
    private bool $is_key_only;

    /**
     * In case of an attribute with a value, $value_data_type should always be set.
     * Otherwise, the type will be inferred, and does not guarantee correct type.
     */
    public function __construct(
        string $key,
        string $value = "",
        FormAttributeValueDataType $value_data_type = null
    )
    {
        $this->key = $key;

        if ($value === "") {
            $this->is_key_only = true;
        } else {
            if ($value_data_type === null) {
                $this->value_data_type = $this->tryInferDataTypeFromValue($value);
            } else {
                $this->value_data_type = $value_data_type;
            }
            $this->value = $value;
            $this->is_key_only = false;
        }
    }

    private function tryInferDataTypeFromValue(string $value): FormAttributeValueDataType
    {
        // NOTE: very rough guess, should be set by the user preferably
        if ($this->startsWithDigit($value) && $this->endsWithDigit($value)) {
            return FormAttributeValueDataType::INTEGER;
        } else {
            return FormAttributeValueDataType::STRING;
        }
    }

    private function startsWithDigit(string $value): bool
    {
        for ($digit = 0; $digit <= 9; $digit++) {
            if (str_starts_with($value, strval($digit))) {
                return true;
            }
        }

        return false;
    }

    private function endsWithDigit(string $value): bool
    {
        for ($digit = 0; $digit <= 9; $digit++) {
            if (str_ends_with($value, strval($digit))) {
                return true;
            }
        }

        return false;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getValueDataType(): FormAttributeValueDataType
    {
        return $this->value_data_type;
    }

    public function isKeyOnly(): bool
    {
        return $this->is_key_only;
    }

    public function __toString(): string
    {
        $string_attr = $this->isKeyOnly() ?
            "$this->key" :
            "$this->key=" . (
                $this->getValueDataType() === FormAttributeValueDataType::STRING ?
                "\"$this->value\"" :
                intval($this->value)
            );
        
        return $string_attr;
    }
}