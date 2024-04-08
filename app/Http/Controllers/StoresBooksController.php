<?php

namespace App\Http\Controllers;

use App\StoreBook\Service\StoreBookService;

class StoresBooksController extends Controller
{
    public function __construct(private StoreBookService $storeBookService) {}

    public function link(string $store, string $book)
    {
        $storeBook = $this->storeBookService->link($store, $book);
        return response()->json($storeBook);
    }

    public function unlink(string $store, string $book)
    {
        $this->storeBookService->unlink($store, $book);
        return response()->json([], 204);
    }


}
