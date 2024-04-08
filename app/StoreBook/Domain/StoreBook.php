<?php

namespace App\StoreBook\Domain;

use JsonSerializable;

class StoreBook implements JsonSerializable
{
    public function __construct(
        private string $store,
        private string $book
    ) {}

    public function getStore(): string
    {
        return $this->store;
    }

    public function getBook(): string
    {
        return $this->book;
    }

    public function jsonSerialize(): mixed
    {
        return ['store' => $this->getStore(), 'book' => $this->getBook()];
    }
}
