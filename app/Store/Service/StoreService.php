<?php

namespace App\Store\Service;

use App\Store\Domain\Store;
use App\Store\Repository\StoreRepository;

class StoreService
{
    private $repository;

    public function __construct(StoreRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(string $name, string $address, bool $active = true): Store
    {
        $store = Store::createStore($name, $address, $active);
        $this->repository->create($store);
        return $store;
    }

    public function read(string $id): ?Store
    {
        return $this->repository->read($id);
    }

    public function update(string $id, string $name = '', string $address = '', ?bool $active = null): Store
    {
        $store = Store::createStore($name, $address, $active, $id);
        return $this->repository->update($store);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }


}
