<?php declare(strict_types=1);

namespace HtmlFormBuilder\FormElement;

final class FormElementIterator implements \Iterator, \Countable, \ArrayAccess
{
    /** @var FormElement[] $elements */
    private array $elements;
    private int $position;

    public function __construct(array $elements)
    {
        $this->elements = $elements;
        $this->position = 0;
    }

    public function current(): mixed
    {
        return $this->elements[$this->position];
    }

    public function next(): void
    {
        $this->position += 1;
    }

    public function key(): mixed
    {
        return $this->position;
    }

    public function valid(): bool
    {
        return isset($this->elements[$this->position]);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->elements[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->elements[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->elements[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->elements[$offset]);
    }

    public function count(): int
    {
        return count($this->elements);
    }
}