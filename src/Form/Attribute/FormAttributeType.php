<?php declare(strict_types=1);

namespace HtmlFormBuilder\Form\Attribute;

enum FormAttributeType: string
{
    case ACCEPT_CHARSET = 'accept-charset';
    case ACTION = 'action';
    case AUTOCOMPLETE = 'autocomplete';
    case ENCTYPE = 'enctype';
    case METHOD = 'method';
    case NAME = 'name';
    case NOVALIDATE = 'novalidate';
    case REL = 'rel';
    case TARGET = 'target';
}