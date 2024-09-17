<?php declare(strict_types=1);

namespace HtmlFormBuilder\FormElement;

final class FormElementCollection implements \IteratorAggregate, \Countable
{
    /** @var FormElement[] $elements */
    private array $elements;

    public function __construct(array $elements = [])
    {
        $this->elements = $elements;
    }

    public function add(FormElement $element): void
    {
        $this->elements[] = $element;
    }

    /**
     * @return FormElement[]
     */
    public function getElements(): array
    {
        return $this->elements;
    }

    public function getIterator(): \Traversable
    {
        return new FormElementIterator($this->elements);
    }

    public function count(): int
    {
        return count($this->elements);
    }
}