<?php

namespace App\Book\Repository;

use App\Book\Domain\Book;
use Illuminate\Support\Facades\DB;

class BookRepository
{

    public function create(Book $book): void
    {
        DB::table('books')->insert([
            'id' => $book->getId(),
            'name' => $book->getName(),
            'isbn' => $book->getIsbn(),
            'value' => $book->getValue(),
        ]);
    }

    public function read(string $id): ?Book
    {
        $row = DB::table('books')->where('id', $id)->first();

        if ($row === null) {
            return null;
        }

        return Book::createBook($row->name, $row->isbn, $row->value, $row->id);
    }

    public function update(Book $book): Book
    {
        $update = [];
        if ($book->getName()) {
            $update['name'] = $book->getName();
        }
        if ($book->getIsbn()) {
            $update['isbn'] = $book->getIsbn();
        }
        if ($book->getValue()) {
            $update['value'] = $book->getValue();
        }
        DB::table('books')->where('id', $book->getId())->update($update);
        return $this->read($book->getId());
    }

    public function delete(string $id): void
    {
        DB::table('books')->where('id', $id)->delete();
    }
}
