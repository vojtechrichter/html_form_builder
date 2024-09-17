<?php declare(strict_types=1);

namespace HtmlFormBuilder\FormElement\FormAttribute;

enum FormAttributeValueDataType: string
{
    case STRING = 'string';
    case INTEGER = 'integer';
}