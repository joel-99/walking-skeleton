<?php

namespace Libero\Journal\Dom;

use ArrayAccess;
use ArrayIterator;
use function count;
use Countable;
use Iterator;
use IteratorAggregate;

final class NodeList implements ArrayAccess, Countable, IteratorAggregate
{
    use ReadOnlyArrayAccess;

    private $nodes;

    /**
     * @internal
     */
    public function __construct(Node ...$nodes)
    {
        $this->nodes = $nodes;
    }

    final public function offsetExists($offset) : bool
    {
        return isset($this->nodes[$offset]);
    }

    final public function offsetGet($offset)
    {
        /*if (false === $this->offsetExists($offset)) {
            return null;
        }*/

        return $this->nodes[$offset];
    }

    final public function getIterator() : Iterator
    {
        return new ArrayIterator($this->nodes);
    }

    final public function count() : int
    {
        return count($this->nodes);
    }
}
