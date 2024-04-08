<?php

namespace App\Http\Controllers;

use App\Store\Service\StoreService;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    public function __construct(private StoreService $storeService) {}

    public function create(Request $request)
    {
        $book = $this->storeService->create($request->input('name'), $request->input('address'), $request->input('active') ?? true);
        return response()->json($book);
    }

    public function read(string $id)
    {
        $book = $this->storeService->read($id);
        return response()->json($book);
    }

    public function update(string $id, Request $request)
    {
        $book = $this->storeService->update($id, $request->input('name') ?? '', $request->input('address') ?? '', $request->input('active') ?? null);
        return response()->json($book);
    }

    public function delete(string $id)
    {
        $this->storeService->delete($id);
        return response()->json([], 204);
    }

}
