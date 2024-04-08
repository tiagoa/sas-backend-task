<?php

namespace App\Http\Controllers;

use App\Book\Service\StoreService;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function __construct(private StoreService $bookService) {}

    public function create(Request $request)
    {
        $book = $this->bookService->create($request->input('name'), $request->input('isbn'), $request->input('value'));
        return response()->json($book);
    }

    public function read(string $id)
    {
        $book = $this->bookService->read($id);
        return response()->json($book);
    }

    public function update(string $id, Request $request)
    {
        $book = $this->bookService->update($id, $request->input('name') ?? '', $request->input('isbn') ?? 0, $request->input('value') ?? 0);
        return response()->json($book);
    }

    public function delete(string $id)
    {
        $this->bookService->delete($id);
        return response()->json([], 204);
    }
}
