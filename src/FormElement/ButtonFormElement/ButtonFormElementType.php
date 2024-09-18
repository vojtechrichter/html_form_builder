<?php declare(strict_types=1);

namespace HtmlFormBuilder\FormElement\ButtonFormElement;

enum ButtonFormElementType: string
{
    case BUTTON = 'button';
    case SUBMIT = 'submit';
    case RESET = 'reset';
}