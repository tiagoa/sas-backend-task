<?php

namespace App\Store\Repository;

use App\Store\Domain\Store;
use Illuminate\Support\Facades\DB;

class StoreRepository
{

    public function create(Store $book): void
    {
        DB::table('stores')->insert([
            'id' => $book->getId(),
            'name' => $book->getName(),
            'address' => $book->getAddress(),
            'active' => $book->isActive(),
        ]);
    }

    public function read(string $id): ?Store
    {
        $row = DB::table('stores')->where('id', $id)->first();

        if ($row === null) {
            return null;
        }

        return Store::createStore($row->name, $row->address, $row->active, $row->id);
    }

    public function update(Store $book): Store
    {
        $update = [];
        if ($book->getName()) {
            $update['name'] = $book->getName();
        }
        if ($book->getAddress()) {
            $update['address'] = $book->getAddress();
        }
        if ($book->isActive() !== null) {
            $update['active'] = $book->isActive();
        }
        DB::table('stores')->where('id', $book->getId())->update($update);
        return $this->read($book->getId());
    }

    public function delete(string $id): void
    {
        DB::table('stores')->where('id', $id)->delete();
    }
}
