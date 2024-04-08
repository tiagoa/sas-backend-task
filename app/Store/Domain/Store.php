<?php

namespace App\Store\Domain;

use JsonSerializable;

class Store implements JsonSerializable
{
    private function __construct(
        private string $name,
        private string $address,
        private ?bool $active,
        private string $id = '',
    ) {}

    public static function createStore(string $name, string $address, ?bool $active, ?string $id = ''): self
    {
        if (!$id) {
            $id = uniqid();
        }
        return new Store($name, $address, $active, $id);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function jsonSerialize(): mixed
    {
        return ['id' => $this->getId(), 'name' => $this->getName(), 'address' => $this->getAddress(), 'active' => $this->isActive()];
    }
}
