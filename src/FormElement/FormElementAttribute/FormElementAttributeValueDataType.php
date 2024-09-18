<?php declare(strict_types=1);

namespace HtmlFormBuilder\FormElement\FormElementAttribute;

enum FormElementAttributeValueDataType: string
{
    case STRING = 'string';
    case INTEGER = 'integer';
}