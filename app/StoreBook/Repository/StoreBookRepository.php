<?php

namespace App\StoreBook\Repository;

use App\StoreBook\Domain\StoreBook;
use Illuminate\Support\Facades\DB;

class StoreBookRepository
{

    public function create(StoreBook $book): void
    {
        DB::table('stores_books')->insert([
            'store_id' => $book->getStore(),
            'book_id' => $book->getBook()
        ]);
    }

    public function delete(StoreBook $storeBook): void
    {
        DB::table('stores_books')
            ->where('store_id', $storeBook->getStore())
            ->where('book_id', $storeBook->getBook())
            ->delete();
    }
}
