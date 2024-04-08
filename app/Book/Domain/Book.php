<?php

namespace App\Book\Domain;

use JsonSerializable;

class Book implements JsonSerializable
{
    private function __construct(
        private string $name,
        private int $isbn,
        private float $value,
        private string $id = '',
    ) {}

    public static function createBook(string $name, int $isbn, float $value, string $id = ''): self
    {
        if (!$id) {
            $id = uniqid();
        }
        return new Book($name, $isbn, $value, $id);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIsbn(): int
    {
        return $this->isbn;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function jsonSerialize(): mixed
    {
        return ['id' => $this->getId(), 'name' => $this->getName(), 'isbn' => $this->getIsbn(), 'value' => $this->getValue()];
    }
}
