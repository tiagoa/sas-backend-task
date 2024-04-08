<?php

namespace App\Book\Service;

use App\Book\Domain\Book;
use App\Book\Repository\BookRepository;

class BookService
{
    private $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(string $name, string $isbn, float $value): Book
    {
        $book = Book::createBook($name, $isbn, $value);
        $this->repository->create($book);
        return $book;
    }

    public function read(string $id): ?Book
    {
        return $this->repository->read($id);
    }

    public function update(string $id, string $name = '', string $isbn = '', float $value = 0): Book
    {
        $book = Book::createBook($name, $isbn, $value, $id);
        return $this->repository->update($book);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }


}
