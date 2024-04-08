<?php

namespace App\StoreBook\Service;

use App\StoreBook\Domain\StoreBook;
use App\StoreBook\Repository\StoreBookRepository;

class StoreBookService
{
    private $repository;

    public function __construct(StoreBookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function link(string $store, string $book): StoreBook
    {
        $storeBook = new StoreBook($store, $book);
        $this->repository->create($storeBook);
        return $storeBook;
    }

    public function unlink(string $store, string $book): void
    {
        $storeBook = new StoreBook($store, $book);
        $this->repository->delete($storeBook);
    }

}
