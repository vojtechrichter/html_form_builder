<?php declare(strict_types=1);

namespace HtmlFormBuilder\FormElement;

final class FormElementCollection implements \IteratorAggregate, \Countable, \ArrayAccess
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

    /**
     * @return FormElementIterator
     */
    public function getIterator(): \Traversable
    {
        return new FormElementIterator($this->elements);
    }

    public function count(): int
    {
        return count($this->elements);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->elements[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->elements[$offset];
    }

    /**
     * @param int $offset
     * @param FormElement $value
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->elements[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        // TODO: Implement offsetUnset() method.
    }
}