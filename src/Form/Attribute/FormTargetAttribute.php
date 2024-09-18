<?php declare(strict_types=1);

namespace HtmlFormBuilder\Form\Attribute;

enum FormTargetAttribute: string
{
    case BLANK = '_blank';
    case SELF = '_self';
    case PARENT = '_parent';
    case TOP = '_top';
}