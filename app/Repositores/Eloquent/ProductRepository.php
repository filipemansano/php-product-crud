<?php

namespace App\Repositores\Eloquent;

use App\Models\Product;
use App\Repositores\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface {

    protected $entity;

    public function __construct(Product $entity){
        $this->entity = $entity;
    }

    /**
     * @return Product[]
     */
    public function index()
    {
        return $this->entity->all();
    }

    public function show($id) : Product
    {
        return $this->entity->findOrFail($id);
    }

    public function store(array $data) : Product
    {
        $product = $this->entity->create($data);

        return $product;
    }

    public function update(array $data, $id) : Product
    {
        $product = $this->entity->findOrFail($id);
        $product->update($data);

        return $product->refresh();
    }

    public function destroy($id) : Product
    {
        $product = $this->entity->findOrFail($id);
        $product->delete();

        return $product;
    }
}
